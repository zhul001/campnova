document.addEventListener("alpine:init", () => {
    Alpine.data("examModal", () => ({
        isOpen: false,
        tryoutId: document.body.getAttribute("data-tryout-id"),
        subtesId: document.body.getAttribute("data-subtes-id"),
        timerInterval: null,
        remainingTime: parseInt(
            document
                .getElementById("timer-display")
                .getAttribute("data-total-seconds")
        ),
        isSubmitting: false,
        submitButtons: ["btnSelesai", "btnSelesaiDesktop"],
        STORAGE_KEY: `jawaban_${document.body.getAttribute("data-tryout-id")}_${document.body.getAttribute("data-subtes-id")}`,

        init: function () {
            const storedTime = localStorage.getItem(`timer_${this.tryoutId}_${this.subtesId}`);
            if (storedTime && parseInt(storedTime) <= 0) {
                localStorage.removeItem(`timer_${this.tryoutId}_${this.subtesId}`);
                localStorage.removeItem(this.STORAGE_KEY);
            }
            
            this.setupTimer();
            this.setupEventListeners();
            this.updateTimerDisplay();
            this.applySavedAnswersOnInit();
        },

        setupTimer: function () {
            if (this.timerInterval) {
                clearInterval(this.timerInterval);
            }

            const storedTime = localStorage.getItem(`timer_${this.tryoutId}_${this.subtesId}`);
            if (storedTime) {
                this.remainingTime = parseInt(storedTime);
            }

            const self = this;
            this.timerInterval = setInterval(function () {
                self.remainingTime--;
                self.updateTimerDisplay();
                
                localStorage.setItem(`timer_${self.tryoutId}_${self.subtesId}`, self.remainingTime);

                if (self.remainingTime <= 0 && !self.isSubmitting) {
                    clearInterval(self.timerInterval);
                    localStorage.removeItem(`timer_${self.tryoutId}_${self.subtesId}`);
                    localStorage.removeItem(self.STORAGE_KEY);
                    self.submitAnswers();
                }
            }, 1000);
        },

        setupEventListeners: function () {
            this.removeEventListeners();

            this.submitButtons.forEach((id) => {
                const btn = document.getElementById(id);
                if (btn) {
                    btn.addEventListener("click", this.handleSubmit.bind(this));
                }
            });
        },

        removeEventListeners: function () {
            this.submitButtons.forEach((id) => {
                const btn = document.getElementById(id);
                if (btn) {
                    btn.replaceWith(btn.cloneNode(true));
                }
            });
        },

        handleSubmit: function (e) {
            e.preventDefault();
            if (!this.isSubmitting) {
                this.openModal();
            }
        },

        updateTimerDisplay: function () {
            const minutes = Math.floor(this.remainingTime / 60);
            const seconds = this.remainingTime % 60;
            const timerDisplay = document.getElementById("timer-display");

            if (timerDisplay) {
                timerDisplay.textContent = `${minutes
                    .toString()
                    .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

                const timerContainer =
                    document.getElementById("timer-container");
                if (timerContainer) {
                    if (this.remainingTime < 60) {
                        timerContainer.classList.add(
                            "text-red-500",
                            "border-red-500"
                        );
                        timerContainer.classList.remove(
                            "text-blue-500",
                            "border-blue-500"
                        );
                    }
                }
            }
        },

        openModal: function () {
            clearInterval(this.timerInterval);
            this.isOpen = true;
        },

        closeModal: function () {
            this.isOpen = false;
            this.setupTimer();
        },

        showLoading: function () {
            const loadingOverlay = document.getElementById('loadingOverlay');
            if (loadingOverlay) {
                loadingOverlay.style.display = 'flex';
            }
        },

        hideLoading: function () {
            const loadingOverlay = document.getElementById('loadingOverlay');
            if (loadingOverlay) {
                loadingOverlay.style.display = 'none';
            }
        },

        applySavedAnswersOnInit: function () {
            const savedAnswers = this.loadAnswersFromStorage();
            if (!savedAnswers) return;

            Object.entries(savedAnswers.pilgan || {}).forEach(([soalId, jawaban]) => {
                const radioInput = document.querySelector(`input[data-soal-pilgan-id="${soalId}"][value="${jawaban}"]`);
                if (radioInput) {
                    radioInput.checked = true;
                    
                    const parent = radioInput.closest(".answer-option");
                    if (parent) {
                        parent.classList.add("bg-blue-50", "border-blue-300");
                        parent.querySelector(".option-letter").classList.add(
                            "bg-blue-500",
                            "text-white",
                            "border-blue-500"
                        );
                    }
                }
            });

            Object.entries(savedAnswers.esai || {}).forEach(([soalId, jawaban]) => {
                const textInput = document.querySelector(`input[data-soal-esai-id="${soalId}"]`);
                if (textInput) {
                    textInput.value = jawaban;
                }
            });

            console.log('Jawaban yang disimpan berhasil diterapkan');
        },

        loadAnswersFromStorage: function () {
            const saved = localStorage.getItem(this.STORAGE_KEY);
            if (saved) {
                try {
                    return JSON.parse(saved);
                } catch (e) {
                    console.error("Error parsing saved answers:", e);
                    return null;
                }
            }
            return null;
        },

        saveAnswersToStorage: function () {
            const jawaban = this.collectAllAnswers();
            localStorage.setItem(this.STORAGE_KEY, JSON.stringify(jawaban));
        },

        collectAllAnswers: function () {
            const jawaban = {
                pilgan: {},
                esai: {}
            };

            document.querySelectorAll('input[type="radio"]:checked').forEach((input) => {
                const soalPilganId = input.getAttribute('data-soal-pilgan-id');
                if (soalPilganId) {
                    jawaban.pilgan[soalPilganId] = input.value;
                }
            });

            document.querySelectorAll('input[type="text"][data-soal-esai-id]').forEach((input) => {
                const soalEsaiId = input.getAttribute('data-soal-esai-id');
                const jawabanText = input.value.trim();
                
                if (soalEsaiId) {
                    jawaban.esai[soalEsaiId] = jawabanText;
                }
            });

            return jawaban;
        },

        collectAnswers: function () {
            const jawabanPilgan = {};
            const jawabanEsai = {};

            document.querySelectorAll('input[type="radio"]:checked').forEach((input) => {
                const soalPilganId = input.getAttribute('data-soal-pilgan-id');
                if (soalPilganId) {
                    jawabanPilgan[soalPilganId] = input.value;
                }
            });

            document.querySelectorAll('input[type="text"][data-soal-esai-id]').forEach((input) => {
                const soalEsaiId = input.getAttribute('data-soal-esai-id');
                const jawaban = input.value.trim();
                
                if (soalEsaiId && jawaban !== "") {
                    jawabanEsai[soalEsaiId] = jawaban;
                }
            });

            return { jawabanPilgan, jawabanEsai };
        },

        cleanupStorage: function () {
            localStorage.removeItem(`timer_${this.tryoutId}_${this.subtesId}`);
            localStorage.removeItem(this.STORAGE_KEY);
        },

        submitAnswers: async function () {
            if (this.isSubmitting) return;

            this.isSubmitting = true;
            clearInterval(this.timerInterval);
            this.closeModal();

            this.showLoading();

            this.cleanupStorage();

            this.submitButtons.forEach((id) => {
                const btn = document.getElementById(id);
                if (btn) {
                    btn.disabled = true;
                    btn.innerHTML =
                        id === "btnSelesai"
                            ? 'Mengirim... <i class="fa-regular fa-circle-check ml-2"></i>'
                            : "Mengirim...";
                }
            });

            try {
                const { jawabanPilgan, jawabanEsai } = this.collectAnswers();

                console.log('Data yang dikirim:', {
                    jawaban_pilgan: jawabanPilgan,
                    jawaban_esai: jawabanEsai
                });

                const response = await fetch(
                    `/tryout/${this.tryoutId}/${this.subtesId}/submit-exam`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },
                        body: JSON.stringify({
                            jawaban_pilgan: jawabanPilgan,
                            jawaban_esai: jawabanEsai,
                        }),
                    }
                );

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                if (data.success) {
                    this.cleanupStorage();
                    window.location.href = `/tryout/${this.tryoutId}?completed=1`;
                } else {
                    throw new Error(data.message || "Gagal menyimpan jawaban");
                }
            } catch (error) {
                console.error("Submission error:", error);

                this.hideLoading();

                this.submitButtons.forEach((id) => {
                    const btn = document.getElementById(id);
                    if (btn) {
                        btn.disabled = false;
                        btn.innerHTML =
                            id === "btnSelesai"
                                ? 'Selesai <i class="fa-regular fa-circle-check ml-2"></i>'
                                : "Selesai";
                    }
                });

                this.isSubmitting = false;
                alert("Gagal mengirim jawaban: " + error.message);
                
                this.setupTimer();
            }
        },
    }));
});

document.addEventListener('DOMContentLoaded', function() {
    const tryoutId = document.body.getAttribute("data-tryout-id");
    const subtesId = document.body.getAttribute("data-subtes-id");
    const STORAGE_KEY = `jawaban_${tryoutId}_${subtesId}`;

    function saveAnswersToStorage() {
        const jawaban = collectAllAnswers();
        localStorage.setItem(STORAGE_KEY, JSON.stringify(jawaban));
    }

    function collectAllAnswers() {
        const jawaban = {
            pilgan: {},
            esai: {}
        };

        document.querySelectorAll('input[type="radio"]:checked').forEach((input) => {
            const soalPilganId = input.getAttribute('data-soal-pilgan-id');
            if (soalPilganId) {
                jawaban.pilgan[soalPilganId] = input.value;
            }
        });

        document.querySelectorAll('input[type="text"][data-soal-esai-id]').forEach((input) => {
            const soalEsaiId = input.getAttribute('data-soal-esai-id');
            const jawabanText = input.value.trim();
            
            if (soalEsaiId) {
                jawaban.esai[soalEsaiId] = jawabanText;
            }
        });

        return jawaban;
    }

    function setupAutoSave() {
        document.querySelectorAll('.answer-option').forEach((option) => {
            option.addEventListener('click', function() {
                setTimeout(saveAnswersToStorage, 100);
            });
        });

        let esaiTimeout;
        document.querySelectorAll('.essay-input').forEach((input) => {
            input.addEventListener('input', function() {
                clearTimeout(esaiTimeout);
                esaiTimeout = setTimeout(saveAnswersToStorage, 500);
            });
        });

        window.addEventListener('beforeunload', function() {
            saveAnswersToStorage();
        });
    }

    function applySavedAnswersOnLoad() {
        const savedAnswers = loadAnswersFromStorage();
        if (!savedAnswers) return;

        Object.entries(savedAnswers.pilgan || {}).forEach(([soalId, jawaban]) => {
            const radioInput = document.querySelector(`input[data-soal-pilgan-id="${soalId}"][value="${jawaban}"]`);
            if (radioInput) {
                radioInput.checked = true;
                
                const parent = radioInput.closest(".answer-option");
                if (parent) {
                    parent.classList.add("bg-blue-50", "border-blue-300");
                    parent.querySelector(".option-letter").classList.add(
                        "bg-blue-500",
                        "text-white",
                        "border-blue-500"
                    );
                }
            }
        });

        Object.entries(savedAnswers.esai || {}).forEach(([soalId, jawaban]) => {
            const textInput = document.querySelector(`input[data-soal-esai-id="${soalId}"]`);
            if (textInput) {
                textInput.value = jawaban;
            }
        });

        console.log('Jawaban yang disimpan berhasil diterapkan saat load');
    }

    function loadAnswersFromStorage() {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved) {
            try {
                return JSON.parse(saved);
            } catch (e) {
                console.error("Error parsing saved answers:", e);
                return null;
            }
        }
        return null;
    }

    setupAutoSave();
    applySavedAnswersOnLoad();
});

window.ExamStorage = {
    saveAnswers: function() {
        const tryoutId = document.body.getAttribute("data-tryout-id");
        const subtesId = document.body.getAttribute("data-subtes-id");
        const STORAGE_KEY = `jawaban_${tryoutId}_${subtesId}`;
        
        const jawaban = {
            pilgan: {},
            esai: {}
        };

        document.querySelectorAll('input[type="radio"]:checked').forEach((input) => {
            const soalPilganId = input.getAttribute('data-soal-pilgan-id');
            if (soalPilganId) {
                jawaban.pilgan[soalPilganId] = input.value;
            }
        });

        document.querySelectorAll('input[type="text"][data-soal-esai-id]').forEach((input) => {
            const soalEsaiId = input.getAttribute('data-soal-esai-id');
            const jawabanText = input.value.trim();
            
            if (soalEsaiId) {
                jawaban.esai[soalEsaiId] = jawabanText;
            }
        });

        localStorage.setItem(STORAGE_KEY, JSON.stringify(jawaban));
    },
    
    cleanup: function() {
        const tryoutId = document.body.getAttribute("data-tryout-id");
        const subtesId = document.body.getAttribute("data-subtes-id");
        const STORAGE_KEY = `jawaban_${tryoutId}_${subtesId}`;
        
        localStorage.removeItem(`timer_${tryoutId}_${subtesId}`);
        localStorage.removeItem(STORAGE_KEY);
    }
};