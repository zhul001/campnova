document.addEventListener("DOMContentLoaded", function () {
    // Toggle sidebar untuk mobile
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
        setTimeout(() => {
            sidebar.classList.add("hidden");
        }, 300);
    });

    // Navigasi soal
    const displayQuestionNumber = document.getElementById(
        "display-question-number"
    );
    const questionButtonsContainer =
        document.getElementById("question-buttons");
    const questionButtons = questionButtonsContainer.querySelectorAll("button");

    const nextBtns = [
        document.getElementById("nextBtn"),
        document.getElementById("nextBtnDesktop"),
    ];
    const prevBtns = [
        document.getElementById("prevBtn"),
        document.getElementById("prevBtnDesktop"),
    ];

    let currentQuestion = 1;
    const maxQuestion = 5;
    const minQuestion = 1;

    function showQuestion(num) {
        // Sembunyikan semua pertanyaan
        for (let i = 1; i <= maxQuestion; i++) {
            const q = document.getElementById("question" + i);
            if (q) q.classList.add("hidden");
        }

        // Tampilkan pertanyaan saat ini
        const currentQ = document.getElementById("question" + num);
        if (currentQ) {
            currentQ.classList.remove("hidden");
        } else {
            document.getElementById("question1").classList.remove("hidden");
            num = 1;
        }

        displayQuestionNumber.textContent = num;

        // Update status aktif tombol sidebar
        questionButtons.forEach((btn) => {
            if (parseInt(btn.dataset.question) === num) {
                btn.classList.add("bg-[#b9e4f4]", "hover:bg-[#a0d3e9]");
                btn.classList.remove("hover:bg-gray-50");
            } else {
                btn.classList.remove("bg-[#b9e4f4]", "hover:bg-[#a0d3e9]");
                btn.classList.add("hover:bg-gray-50");
            }
        });

        currentQuestion = num;
    }

    function nextQuestion() {
        if (currentQuestion < maxQuestion) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    }

    function prevQuestion() {
        if (currentQuestion > minQuestion) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    }

    // Event listeners untuk navigasi
    nextBtns.forEach((btn) => btn.addEventListener("click", nextQuestion));
    prevBtns.forEach((btn) => btn.addEventListener("click", prevQuestion));

    // Event listeners untuk tombol sidebar
    questionButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const qNum = parseInt(btn.dataset.question);
            if (!isNaN(qNum)) {
                showQuestion(qNum);
                if (window.innerWidth < 1024) {
                    sidebar.classList.remove("mobile-active");
                    sidebar.classList.add("mobile-hide");
                    setTimeout(() => {
                        sidebar.classList.add("hidden");
                    }, 300);
                }
            }
        });
    });

    // Inisialisasi
    showQuestion(currentQuestion);
});
