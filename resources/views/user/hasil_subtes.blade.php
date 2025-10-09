<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Quiz App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="text-gray-700">

    <x-navbar></x-navbar>

    <main class="flex h-screen relative">
        <!-- Sidebar -->
        <aside aria-label="Sidebar"
            class="hidden lg:flex fixed mt-12 inset-x-0 bottom-0 z-40 max-h-[90vh] border-t border-gray-200 px-4 py-6 flex-col space-y-6 overflow-y-auto bg-white lg:relative lg:inset-auto lg:max-h-full lg:max-w-72 lg:border-t-0 lg:border-r"
            id="sidebar" style="transform: translateY(100%); opacity: 0">
            <div class="space-y-2 border-b pb-4 border-gray-200">
                <div class="space-y-1">
                    <h1 class="text-xl font-semibold text-gray-900">
                        Try Out UTBK SNBT 10 2025
                    </h1>
                    <h3 class="text-base font-medium text-gray-700">
                        Kemampuan Memahami Bacaan dan Menulis
                    </h3>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="flex items-center space-x-1">
                        <div class="h-3 w-3 rounded-full bg-green-500"></div>
                        <span class="text-xs text-gray-600">Benar</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <div class="h-3 w-3 rounded-full bg-red-500"></div>
                        <span class="text-xs text-gray-600">Salah</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <div class="h-3 w-3 rounded-full bg-gray-200"></div>
                        <span class="text-xs text-gray-600">Kosong</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-5 gap-2" id="question-buttons">
                <button class="border border-gray-300 rounded-md py-2 text-center text-gray-900 hover:bg-gray-50"
                    data-question="1" type="button">
                    1
                </button>
                <button
                    class="border border-gray-300 rounded-md py-2 text-center text-gray-900 bg-[#b9e4f4] hover:bg-[#a0d3e9]"
                    data-question="2" type="button">
                    2
                </button>
                <button class="border border-gray-300 rounded-md py-2 text-center text-gray-900 hover:bg-gray-50"
                    data-question="3" type="button">
                    3
                </button>
                <button class="border border-gray-300 rounded-md py-2 text-center text-gray-900 hover:bg-gray-50"
                    data-question="4" type="button">
                    4
                </button>
                <button class="border border-gray-300 rounded-md py-2 text-center text-gray-900 hover:bg-gray-50"
                    data-question="5" type="button">
                    5
                </button>
            </div>
            <button
                class="lg:hidden mt-4 w-full bg-[#b9e4f4] hover:bg-[#a0d3e9] text-black rounded-md py-2 font-semibold flex items-center justify-center"
                id="closeSidebarBtn" type="button">
                <span>Tutup</span>
            </button>
        </aside>

        <!-- Konten Utama -->
        <section class="flex-1 p-6 overflow-y-auto mb-6 bg-gray-50 mt-12">
            <div class="w-full lg:max-w-6xl lg:mx-auto mb-4 flex items-center">
                <h2 class="text-base font-semibold text-gray-700">NO.</h2>
                <span class="text-base font-semibold text-gray-700 ml-2" id="display-question-number">1</span>
            </div>

            <!-- Pertanyaan 1 -->
            <div id="question1">
                <article class="w-full lg:max-w-6xl lg:mx-auto space-y-4 text-sm leading-relaxed text-justify">
                    <p>
                        means of forestalling many diseases all at once. "This is the
                        opposite of precision medicine," Klausner said. Lorem ipsum dolor
                    </p>
                </article>
                <div class="w-full lg:max-w-6xl lg:mx-auto mt-6 space-y-3 text-gray-700 text-sm">
                    <div class="flex items-center space-x-3 border border-gray-200 rounded-lg p-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-full text-gray-500 font-semibold">
                            A
                        </div>
                        <span>Advertisers</span>
                    </div>
                    <div class="flex items-center space-x-3 border border-gray-200 rounded-lg p-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-full text-gray-500 font-semibold">
                            B
                        </div>
                        <span>Supporters</span>
                    </div>
                    <div class="flex items-center space-x-3 border border-gray-200 rounded-lg p-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-full text-gray-500 font-semibold">
                            C
                        </div>
                        <span>Advocates</span>
                    </div>
                    <div class="flex items-center space-x-3 border border-green-500 bg-green-50 rounded-lg p-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-full text-gray-500 font-semibold">
                            D
                        </div>
                        <span>Initiators</span>
                    </div>
                    <div class="flex items-center space-x-3 border border-red-500 bg-red-50 rounded-lg p-3">
                        <div
                            class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-full text-gray-500 font-semibold">
                            E
                        </div>
                        <span>Detractors</span>
                    </div>
                    <div class="mt-6 rounded-lg bg-white p-4 shadow-sm sm:p-6">
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 rounded-full bg-red-100 px-2 py-1 sm:px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="h-4 w-4 text-red-600 sm:h-5 sm:w-5">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-xs font-medium text-red-700 sm:text-sm">Jawaban Salah</span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="space-y-2">
                                        <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                            Jawaban Kamu
                                        </p>
                                        <div
                                            class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                            <span class="text-xs font-medium text-gray-800 sm:text-sm">E</span>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                            Jawaban Benar
                                        </p>
                                        <div
                                            class="inline-flex items-center rounded-md bg-emerald-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                            <span class="text-xs font-medium text-emerald-800 sm:text-sm">D</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="py-3 text-xl font-semibold">Solusi</div>
                    <div class="mb-6 rounded-lg border border-gray-200 bg-white p-3 sm:p-6">
                        <article
                            class="prose max-w-none overflow-x-auto text-justify lg:prose-lg prose-strong:font-bold prose-pre:overflow-x-auto prose-table:border prose-th:border prose-th:bg-emerald-500 prose-th:p-2 prose-th:font-sans prose-th:text-white prose-td:border prose-td:p-2 prose-img:mx-auto prose-img:max-w-full">
                            <div class="relative">
                                <p>Dalam teks ini, terdapat kalimat yang tidak memerlukan</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Pertanyaan 2 (tersembunyi) -->
            <div id="question2" class="hidden">
                <article class="w-full lg:max-w-6xl lg:mx-auto space-y-4 text-sm leading-relaxed text-justify">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error,
                    </p>
                </article>
                <div class="w-full lg:max-w-6xl lg:mx-auto mt-6 space-y-2 text-gray-700 text-sm">
                    <input type="text" class="w-full md:w-5/12 px-4 py-3 border border-gray-300 rounded-lg" />
                </div>
            </div>

            <!-- Navigasi -->
            <div class="max-w-4xl mx-auto mt-6 sticky bottom-0 z-10 w-full bg-white mb-2">
                <!-- Mobile Navigation -->
                <div class="flex lg:hidden mobile-bottom-nav justify-between px-4">
                    <button
                        class="transition-colors bg-blue-500 text-white shadow-sm hover:bg-blue-600 rounded-md w-20 md:w-32 h-10 flex items-center justify-center"
                        id="prevBtn" type="button">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button aria-label="Toggle sidebar"
                        class="transition-colors bg-blue-500 text-white shadow-sm hover:bg-blue-600 rounded-md w-20 md:w-32 h-10 flex items-center justify-center"
                        id="toggleSidebarBtn" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button
                        class="transition-colors bg-blue-500 text-white shadow-sm hover:bg-blue-600 rounded-md w-20 md:w-32 h-10 flex items-center justify-center"
                        id="nextBtn" type="button">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex justify-between items-center desktop-nav-fixed">
                    <div class="flex items-center space-x-4">
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-blue-500 text-white shadow-sm hover:bg-blue-600 h-9 px-4 py-2"
                            id="prevBtnDesktop"
                            style="
                  margin-left: 18rem;
                  min-width: 120px;
                  max-width: 160px;
                  z-index: 10;
                  position: relative;
                "
                            type="button">
                            <i class="fas fa-chevron-left mr-2"></i>
                            Sebelumnya
                        </button>
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium bg-blue-500 text-white shadow-sm hover:bg-blue-600 h-9 px-4 py-2"
                            id="nextBtnDesktop" type="button">
                            Selanjutnya
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toggle sidebar untuk mobile
            const toggleBtns = document.querySelectorAll("#toggleSidebarBtn");
            const closeBtn = document.getElementById("closeSidebarBtn");
            const sidebar = document.getElementById("sidebar");

            toggleBtns.forEach((toggleBtn) => {
                toggleBtn.addEventListener("click", function() {
                    sidebar.classList.remove("hidden", "mobile-hide");
                    sidebar.classList.add("mobile-active");
                });
            });

            closeBtn.addEventListener("click", function() {
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
            const questionButtons =
                questionButtonsContainer.querySelectorAll("button");

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
    </script>
</body>

</html>
