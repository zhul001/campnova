document.addEventListener("DOMContentLoaded", function () {
    // Data untuk localStorage
    const tryoutId = document.body.getAttribute("data-tryout-id");
    const subtesId = document.body.getAttribute("data-subtes-id");
    const STORAGE_KEY = `jawaban_${tryoutId}_${subtesId}`;

    const toggleBtns = document.querySelectorAll("#toggleSidebarBtn");
    const closeBtn = document.getElementById("closeSidebarBtn");
    const sidebar = document.getElementById("sidebar");

    toggleBtns.forEach((toggleBtn) => {
        toggleBtn.addEventListener("click", function () {
            sidebar.classList.remove("hidden", "mobile-hide");
            sidebar.classList.add("mobile-active");
        });
    });

    closeBtn.addEventListener("click", function () {
        sidebar.classList.remove("mobile-active");
        sidebar.classList.add("mobile-hide");
        setTimeout(() => sidebar.classList.add("hidden"), 300);
    });

    const currentQuestionNumber = document.getElementById(
        "current-question-number"
    );
    const displayQuestionNumber = document.getElementById(
        "display-question-number"
    );
    const questionButtonsContainer =
        document.getElementById("question-buttons");
    const questionButtons = questionButtonsContainer.querySelectorAll("button");

    const nextBtnMobile = document.getElementById("nextBtn");
    const prevBtnMobile = document.getElementById("prevBtn");
    const nextBtnDesktop = document.getElementById("nextBtnDesktop");
    const prevBtnDesktop = document.getElementById("prevBtnDesktop");

    const answeredCountSpan = document.getElementById("answered-count");

    let currentQuestion = 1;
    const quizContainer = document.getElementById("quiz-container");
    const maxQuestion = parseInt(quizContainer.dataset.totalSoal);
    const minQuestion = 1;

    const answeredQuestions = new Set();

    function saveAnswersToStorage() {
        const jawaban = collectAllAnswers();
        localStorage.setItem(STORAGE_KEY, JSON.stringify(jawaban));
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
            
            if (soalEsaiId && jawabanText !== "") {
                jawaban.esai[soalEsaiId] = jawabanText;
            }
        });

        return jawaban;
    }

    function applySavedAnswers(savedAnswers) {
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

                const questionNum = parseInt(radioInput.name.replace("answer", ""));
                answeredQuestions.add(questionNum);
            }
        });

        Object.entries(savedAnswers.esai || {}).forEach(([soalId, jawaban]) => {
            const textInput = document.querySelector(`input[data-soal-esai-id="${soalId}"]`);
            if (textInput) {
                textInput.value = jawaban;
                
                const questionNum = parseInt(textInput.dataset.nomorSoal);
                answeredQuestions.add(questionNum);
            }
        });

        updateAnsweredCount();
    }

    function updateAnsweredCount() {
        answeredCountSpan.textContent = answeredQuestions.size;
        questionButtons.forEach((btn) => {
            const questionNum = parseInt(btn.dataset.question);
            if (answeredQuestions.has(questionNum)) {
                btn.classList.add("answered");
            } else {
                btn.classList.remove("answered");
            }
        });
    }

    function showQuestion(num) {
        document
            .querySelectorAll(".question-container")
            .forEach((container) => {
                container.classList.add("hidden");
            });

        const currentQ = document.getElementById("question" + num);
        if (currentQ) {
            currentQ.classList.remove("hidden");
        } else {
            document.getElementById("question1").classList.remove("hidden");
            num = 1;
        }

        currentQuestionNumber.textContent = num;
        displayQuestionNumber.textContent = num;
        currentQuestion = num;

        questionButtons.forEach((btn) => {
            const questionNum = parseInt(btn.dataset.question);
            if (questionNum === num) {
                btn.classList.add("active-question");
            } else {
                btn.classList.remove("active-question");
            }
        });
    }

    function nextQuestion() {
        currentQuestion = (currentQuestion % maxQuestion) + 1;
        showQuestion(currentQuestion);
    }

    function prevQuestion() {
        currentQuestion =
            ((currentQuestion - 2 + maxQuestion) % maxQuestion) + 1;
        showQuestion(currentQuestion);
    }

    nextBtnMobile.addEventListener("click", nextQuestion);
    nextBtnDesktop.addEventListener("click", nextQuestion);
    prevBtnMobile.addEventListener("click", prevQuestion);
    prevBtnDesktop.addEventListener("click", prevQuestion);

    questionButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const qNum = parseInt(btn.dataset.question);
            showQuestion(qNum);
            if (window.innerWidth < 1024) {
                sidebar.classList.remove("mobile-active");
                sidebar.classList.add("mobile-hide");
                setTimeout(() => sidebar.classList.add("hidden"), 300);
            }
        });
    });

    const zoomInBtn = document.getElementById("zoomInBtn");
    const zoomOutBtn = document.getElementById("zoomOutBtn");
    let currentFontSize = 16;

    function setFontSize(size) {
        document
            .querySelectorAll('[id^="question"] article')
            .forEach((article) => {
                article.style.fontSize = size + "px";
            });
    }

    zoomInBtn.addEventListener("click", () => {
        if (currentFontSize < 30) {
            currentFontSize += 2;
            setFontSize(currentFontSize);
        }
    });

    zoomOutBtn.addEventListener("click", () => {
        if (currentFontSize > 12) {
            currentFontSize -= 2;
            setFontSize(currentFontSize);
        }
    });

    function setupAnswerOptions() {
        document.querySelectorAll(".answer-option").forEach((option) => {
            option.addEventListener("click", function () {
                const radio = this.querySelector('input[type="radio"]');
                const questionNum = parseInt(radio.name.replace("answer", ""));

                if (radio.checked) {
                    radio.checked = false;
                    this.classList.remove("bg-blue-50", "border-blue-300");
                    this.querySelector(".option-letter").classList.remove(
                        "bg-blue-500",
                        "text-white",
                        "border-blue-500"
                    );
                    answeredQuestions.delete(questionNum);
                } else {
                    document
                        .querySelectorAll(`input[name="${radio.name}"]`)
                        .forEach((r) => {
                            r.checked = false;
                            const parent = r.closest(".answer-option");
                            parent?.classList.remove(
                                "bg-blue-50",
                                "border-blue-300"
                            );
                            parent
                                ?.querySelector(".option-letter")
                                .classList.remove(
                                    "bg-blue-500",
                                    "text-white",
                                    "border-blue-500"
                                );
                        });

                    radio.checked = true;
                    this.classList.add("bg-blue-50", "border-blue-300");
                    this.querySelector(".option-letter").classList.add(
                        "bg-blue-500",
                        "text-white",
                        "border-blue-500"
                    );
                    answeredQuestions.add(questionNum);
                }
                
                updateAnsweredCount();
                saveAnswersToStorage();
            });
        });

        document.querySelectorAll(".essay-input").forEach((input) => {
            const questionNum = parseInt(input.dataset.nomorSoal);

            if (input.value.trim() !== "") {
                answeredQuestions.add(questionNum);
            }

            input.addEventListener("input", function () {
                if (this.value.trim() !== "") {
                    answeredQuestions.add(questionNum);
                } else {
                    answeredQuestions.delete(questionNum);
                }
                updateAnsweredCount();
                saveAnswersToStorage();
            });
        });

        updateAnsweredCount();
    }

    function cleanupStorage() {
        localStorage.removeItem(STORAGE_KEY);
    }

    window.addEventListener('beforeunload', function() {
        saveAnswersToStorage();
    });

    showQuestion(1);
    
    const savedAnswers = loadAnswersFromStorage();
    if (savedAnswers) {
        applySavedAnswers(savedAnswers);
    }
    
    setupAnswerOptions();
    updateAnsweredCount();

    window.cleanupExamStorage = cleanupStorage;
});