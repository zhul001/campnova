<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Exam - Campnova</title>
    <link rel="icon" href="{{ Vite::asset('resources/img/logo_campnova_blue_f.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/exam.css') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        [x-cloak] {
            display: none !important;
        }

        .modal-enter-active,
        .modal-leave-active {
            transition: opacity 0.3s;
        }

        .modal-enter-from,
        .modal-leave-to {
            opacity: 0;
        }

        .answered {
            background-color: #b9e4f4 !important;
            border-color: #a0d3e9 !important;
        }

        .active-question {
            background-color: #dbeafe !important;
            border-color: #3b82f6 !important;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-text {
            margin-top: 20px;
            font-size: 18px;
            font-weight: 600;
            color: #3b82f6;
        }
    </style>

</head>

<body class="bg-white text-gray-700" data-tryout-id="{{ $tryout_id }}" data-subtes-id="{{ $subtes_id }}">
    <header class="flex items-center justify-between border-b border-gray-200 px-4 sm:px-6 lg:px-8 h-16">
        <div class="flex items-center space-x-2">
            <img class="w-8 h-8" height="32" src="{{ asset('img/logo_campnova_blue.svg') }}" width="32" />
            <span class="font-extrabold text-xl select-none hidden sm:inline">
                Campnova
            </span>
        </div>
        <div class="hidden md:flex flex-col items-center text-gray-600 text-sm select-none">
            <span> Nomor Soal </span>
            <span class="font-extrabold text-2xl leading-none" id="current-question-number">
            </span>
        </div>
        <div class="flex items-center text-blue-500 hover-bg-blue-500 font-medium text-sm border border-blue-500 rounded-full px-3 py-1"
            id="timer-container">
            <i class="fa-regular fa-clock mr-2"> </i>
            <span id="timer-display" data-total-seconds="{{ $subtes->timer }}">
                @php
                    $minutes = floor($subtes->timer / 60);
                    $seconds = $subtes->timer % 60;
                    echo sprintf('%02d:%02d', $minutes, $seconds);
                @endphp
            </span>
        </div>
        <button
            class="flex items-center bg-[#b9e4f4] hover:bg-[#a0d3e9] text-sm font-semibold px-4 py-1.5 rounded-full btn-selesai-desktop-hide"
            id="btnSelesai">
            Selesai
            <i class="fa-regular fa-circle-check ml-2"> </i>
        </button>
    </header>
    <main class="flex h-[calc(100vh-64px)] relative">
        <aside aria-label="Sidebar"
            class="hidden lg:flex fixed inset-x-0 bottom-0 z-40 max-h-[90vh] border-t border-gray-200 px-4 py-6 flex-col space-y-6 overflow-y-auto bg-white lg:relative lg:inset-auto lg:max-h-full lg:w-80 lg:border-t-0 lg:border-r"
            id="sidebar" style="transform: translateY(100%); opacity: 0">
            <button
                class="hidden lg:block w-full border border-gray-300 rounded-md py-2 text-center font-semibold text-gray-900 hover:bg-gray-50"
                type="button">
                {{ Auth::user()->nama_panjang }}
            </button>
            <div
                class="border border-gray-300 rounded-md p-4 text-center text-gray-900 font-semibold text-sm leading-tight">
                <div>{{ $subtes->tipeSubtes->nama_tipe }}</div>
                <div class="text-base mt-1">{{ $subtes->judul_subtes }}</div>
            </div>
            <div class="flex items-baseline text-2xl font-semibold leading-8 text-blue-600">
                <span id="answered-count">0</span>
                <span class="ml-2 text-sm font-medium leading-5 text-gray-500">dari {{ $totalSoal }} Soal
                    dikerjakan</span>
            </div>
            <div class="grid grid-cols-5 gap-2" id="question-buttons">
                @for ($i = 1; $i <= $totalSoal; $i++)
                    <button
                        class="border border-gray-300 rounded-md py-2 text-center text-gray-900 hover:bg-gray-50 question-btn"
                        data-question="{{ $i }}" type="button" id="btn-question-{{ $i }}">
                        {{ $i }}
                    </button>
                @endfor
            </div>
            <button
                class="mt-4 bg-[#b9e4f4] hover:bg-[#a0d3e9] text-black border border-gray-300 rounded-md py-2 font-semibold items-center justify-center hidden lg:flex"
                type="button" id="btnSelesaiDesktop">
                <span> Selesai </span>
            </button>
            <button
                class="lg:hidden mt-4 w-full bg-[#b9e4f4] hover:bg-[#a0d3e9] text-black rounded-md py-2 font-semibold flex items-center justify-center"
                id="closeSidebarBtn" type="button">
                <span> Tutup </span>
            </button>
            <div id="quiz-container" data-total-soal="{{ $totalSoal }}"></div>
        </aside>
        <section class="flex-1 p-6 overflow-y-auto mb-6">
            @foreach ($soalPilgan as $index => $soal)
                <div id="question{{ $soal->nomor_soal }}" class="question-container {{ $index > 0 ? 'hidden' : '' }}">
                    <div class="w-full lg:max-w-6xl lg:mx-auto mb-4 flex items-center">
                        <h2 class="text-base font-semibold text-gray-700">NO.</h2>
                        <span class="text-base font-semibold text-gray-700 ml-2"
                            id="display-question-number">{{ $soal->nomor_soal }}</span>
                    </div>
                    <article class="w-full lg:max-w-6xl lg:mx-auto space-y-4 text-sm leading-relaxed text-justify"
                        style="font-size: 1rem">
                        <p>{!! $soal->soal !!}</p>
                        @if ($soal->soal_gambar)
                            <img src="{{ asset('storage/' . $soal->soal_gambar) }}" alt="Gambar Soal"
                                class="max-w-full">
                        @endif
                    </article>
                    <form class="w-full lg:max-w-6xl lg:mx-auto mt-6 space-y-3 text-gray-700 text-sm" id="quiz-form">
                        @foreach (['a', 'b', 'c', 'd', 'e'] as $option)
                            @if ($soal->{'jawaban_' . $option})
                                <label
                                    class="flex items-center space-x-3 border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-gray-50 answer-option"
                                    for="answer-{{ $option }}{{ $soal->nomor_soal }}">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-full text-gray-500 font-semibold option-letter">
                                        {{ strtoupper($option) }}
                                    </div>
                                    <input class="hidden" id="answer-{{ $soal->nomor_soal }}"
                                        name="answer{{ $soal->nomor_soal }}" type="radio"
                                        value="{{ strtoupper($option) }}" data-soal-pilgan-id="{{ $soal->id }}" />
                                    <span>{!! $soal->{'jawaban_' . $option} !!}</span>
                                </label>
                            @endif
                        @endforeach
                    </form>
                </div>
            @endforeach

            @foreach ($soalEsai as $index => $soal)
                @php $questionNumber = $soalPilgan->count() + $index + 1; @endphp
                <div id="question{{ $soal->nomor_soal }}" class="question-container hidden"
                    data-soal-esai-id="{{ $soal->id }}">
                    <div class="w-full lg:max-w-6xl lg:mx-auto mb-4 flex items-center">
                        <h2 class="text-base font-semibold text-gray-700">NO.</h2>
                        <span class="text-base font-semibold text-gray-700 ml-2">{{ $soal->nomor_soal }}</span>
                    </div>
                    <article class="w-full lg:max-w-6xl lg:mx-auto space-y-4 text-sm leading-relaxed text-justify"
                        style="font-size: 1rem">
                        <p>{!! $soal->soal !!}</p>
                        @if ($soal->soal_gambar)
                            <img src="{{ asset('storage/' . $soal->soal_gambar) }}" alt="Gambar Soal"
                                class="max-w-full">
                        @endif
                    </article>
                    <div class="w-full lg:max-w-6xl lg:mx-auto mt-6 space-y-2 text-gray-700 text-sm">
                        <input type="text" id="essay-input-{{ $soal->nomor_soal }}"
                            class="essay-input w-full md:w-5/12 px-4 py-3 border border-gray-300 focus:outline-none rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                            data-soal-esai-id="{{ $soal->id }}" data-nomor-soal="{{ $soal->nomor_soal }}"
                            autocomplete="off" />
                    </div>
                </div>
            @endforeach

            <div class="max-w-4xl mx-auto mt-6 sticky bottom-0 z-10 w-full bg-white mb-2">
                <div class="flex lg:hidden mobile-bottom-nav justify-between px-4">
                    <button
                        class="transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-white shadow-sm hover:bg-blue-600 rounded-md w-20 md:w-32 h-10 flex items-center justify-center"
                        id="prevBtn" type="button">
                        <i class="fas fa-chevron-left"> </i>
                    </button>
                    <button aria-label="Toggle sidebar"
                        class="transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-white shadow-sm hover:bg-blue-600 rounded-md w-20 md:w-32 h-10 flex items-center justify-center"
                        id="toggleSidebarBtn" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                            class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z">
                            </path>
                        </svg>
                    </button>
                    <button
                        class="transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-white shadow-sm hover:bg-blue-600 rounded-md w-20 md:w-32 h-10 flex items-center justify-center"
                        id="nextBtn" type="button">
                        <i class="fas fa-chevron-right"> </i>
                    </button>
                </div>
                <div class="hidden lg:flex justify-between items-center desktop-nav-fixed">
                    <div class="flex items-center space-x-4">
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-white shadow-sm hover:bg-blue-600 h-9 px-4 py-2"
                            id="prevBtnDesktop"
                            style=" margin-left: 18rem; min-width: 120px; max-width: 160px; z-index: 10; position: relative;"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="mr-2 h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Sebelumnya
                        </button>
                        <button
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-white shadow-sm hover:bg-blue-600 h-9 px-4 py-2"
                            id="nextBtnDesktop" type="button">
                            Selanjutnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex space-x-2">
                        <button aria-label="Zoom out"
                            class="shadow-xs ml-3 inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 disabled:opacity-75"
                            id="zoomOutBtn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                aria-hidden="true" data-slot="icon" class="h-5 w-5">
                                <path d="M8.75 6.25h-3.5a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5Z"></path>
                                <path fill-rule="evenodd"
                                    d="M7 12c1.11 0 2.136-.362 2.965-.974l2.755 2.754a.75.75 0 1 0 1.06-1.06l-2.754-2.755A5 5 0 1 0 7 12Zm0-1.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button aria-label="Zoom in"
                            class="shadow-xs inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-blue-500  focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 disabled:opacity-75"
                            id="zoomInBtn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                aria-hidden="true" data-slot="icon" class="h-5 w-5">
                                <path
                                    d="M6.25 8.75v-1h-1a.75.75 0 0 1 0-1.5h1v-1a.75.75 0 0 1 1.5 0v1h1a.75.75 0 0 1 0 1.5h-1v1a.75.75 0 0 1-1.5 0Z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M7 12c1.11 0 2.136-.362 2.965-.974l2.755 2.754a.75.75 0 1 0 1.06-1.06l-2.754-2.755A5 5 0 1 0 7 12Zm0-1.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div id="loadingOverlay" class="loading-overlay" style="display: none;">
        <lottie-player src="{{ asset('animations/sandy-loading.json') }}" background="transparent" speed="1"
            style="width: 200px; height: 200px;" loop autoplay>
        </lottie-player>
        <div class="loading-text">Mengirim jawaban...</div>
    </div>

    <div x-data="examModal" x-cloak>
        <div x-show="isOpen" class="fixed inset-0 bg-black/20 backdrop-blur z-50 transition-opacity"></div>

        <div x-show="isOpen" @click.away="closeModal" x-transition
            class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border border-slate-200 bg-white p-6 shadow-lg sm:rounded-lg">
            <div class="flex flex-col space-y-1.5 text-center sm:text-left">
                <h2 class="text-lg font-semibold leading-none tracking-tight">
                    Selesai Try Out
                </h2>
            </div>
            <div>
                Apakah kamu yakin ingin menyelesaikan ujian ini?
            </div>
            <div class="sm:justify-end sm:space-x-2 flex flex-col-reverse gap-2 sm:flex-row sm:gap-0">
                <button @click="closeModal"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 border border-slate-200 bg-white shadow-sm hover:bg-slate-100 hover:text-slate-90 h-9 px-4 py-2">
                    Kembali
                </button>
                <button @click="submitAnswers" :disabled="isSubmitting"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 bg-slate-900 text-slate-50 shadow hover:bg-slate-900/90 h-9 px-4 py-2">
                    Selesai Ujian
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/submitexam.js') }}"></script>
    <script src="{{ asset('js/exam.js') }}"></script>

</body>

</html>
