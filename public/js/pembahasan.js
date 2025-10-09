document.addEventListener("DOMContentLoaded", function () {
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

    const questionContents = document.querySelectorAll(".question-content");
    const maxQuestion = questionContents.length;
    const minQuestion = 1;
    let currentQuestion = 1;

    function showQuestion(num) {
        if (num < minQuestion) num = minQuestion;
        if (num > maxQuestion) num = maxQuestion;

        questionContents.forEach((q) => q.classList.add("hidden"));

        const currentQ = document.getElementById("question" + num);
        if (currentQ) {
            currentQ.classList.remove("hidden");
        } else {
            document.getElementById("question1").classList.remove("hidden");
            num = 1;
        }

        displayQuestionNumber.textContent = num;

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

    nextBtns.forEach((btn) => btn.addEventListener("click", nextQuestion));
    prevBtns.forEach((btn) => btn.addEventListener("click", prevQuestion));

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

    showQuestion(currentQuestion);

    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowRight") {
            nextQuestion();
        } else if (e.key === "ArrowLeft") {
            prevQuestion();
        }
    });
});
