<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Pembahasan Tryout - {{ $tryout->judul_paket ?? 'Tryout Tidak Ditemukan' }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    <link href="{{ asset('css/pembahasan.css') }}" rel="stylesheet" />
</head>

<body class="text-gray-700">
    <x-navbar></x-navbar>
    <main class="flex h-screen relative mt-14">
        <!-- Cek jika data tryout dan subtes tersedia -->
        @if (!$tryout || !$subtes)
            <section class="flex-1 p-6 overflow-y-auto mb-6 bg-gray-50 flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-2xl font-bold text-red-600 mb-4">Data Tryout Tidak Ditemukan</h1>
                    <p class="text-gray-700 mb-4">Tryout atau subtes yang Anda cari tidak ditemukan.</p>
                    <a href="{{ url()->previous() }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Kembali
                    </a>
                </div>
            </section>
        @else
            <!-- Sidebar -->
            <aside aria-label="Sidebar"
                class="hidden lg:flex fixed inset-x-0 bottom-0 z-40 max-h-[90vh] border-t border-gray-200 px-4 py-6 flex-col space-y-6 overflow-y-auto bg-white lg:relative lg:inset-auto lg:max-h-full lg:max-w-72 lg:border-t-0 lg:border-r"
                id="sidebar" style="transform: translateY(100%); opacity: 0">
                <div class="space-y-2 border-b pb-4 border-gray-200">
                    <div class="space-y-1">
                        <h1 class="text-xl font-semibold text-gray-900">
                            {{ $tryout->judul_paket }}
                        </h1>
                        <h3 class="text-base font-medium text-gray-700">
                            {{ $subtes->nama_subtes }}
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
                    @php
                        // Gabungkan semua soal dan urutkan berdasarkan nomor_soal
                        $allQuestions = collect();

                        if (isset($soalPilgans) && $soalPilgans->count() > 0) {
                            foreach ($soalPilgans as $soal) {
                                $allQuestions->push([
                                    'type' => 'pilgan',
                                    'id' => $soal->id,
                                    'nomor_soal' => $soal->nomor_soal,
                                    'soal' => $soal,
                                ]);
                            }
                        }

                        if (isset($soalEsais) && $soalEsais->count() > 0) {
                            foreach ($soalEsais as $soal) {
                                $allQuestions->push([
                                    'type' => 'esai',
                                    'id' => $soal->id,
                                    'nomor_soal' => $soal->nomor_soal,
                                    'soal' => $soal,
                                ]);
                            }
                        }

                        // Urutkan berdasarkan nomor_soal
                        $allQuestions = $allQuestions->sortBy('nomor_soal');
                    @endphp

                    @foreach ($allQuestions as $index => $question)
                        @php
                            $questionNumber = $question['nomor_soal'];
                            $jawabanKey =
                                $question['type'] === 'pilgan'
                                    ? 'pilgan_' . $question['id']
                                    : 'esai_' . $question['id'];

                            $bgClass = 'bg-white';
                            $borderClass = 'border-gray-300';

                            if (isset($jawabanPesertas[$jawabanKey])) {
                                $jawaban = $jawabanPesertas[$jawabanKey];
                                if ($jawaban->is_correct) {
                                    $bgClass = 'bg-green-50';
                                    $borderClass = 'border-green-500';
                                } else {
                                    $bgClass = 'bg-red-50';
                                    $borderClass = 'border-red-500';
                                }
                            } else {
                                $bgClass = 'bg-gray-50';
                                $borderClass = 'border-gray-300';
                            }
                        @endphp

                        <button
                            class="border rounded-md py-2 text-center text-gray-900 hover:bg-gray-50 {{ $borderClass }} {{ $bgClass }}"
                            data-question="{{ $questionNumber }}" type="button">
                            {{ $questionNumber }}
                        </button>
                    @endforeach
                </div>
                <button
                    class="lg:hidden mt-4 w-full bg-[#b9e4f4] hover:bg-[#a0d3e9] text-black rounded-md py-2 font-semibold flex items-center justify-center"
                    id="closeSidebarBtn" type="button">
                    <span>Tutup</span>
                </button>
            </aside>

            <!-- Konten Utama -->
            <section class="flex-1 p-6 overflow-y-auto mb-6 bg-gray-50">
                <div class="w-full lg:max-w-6xl lg:mx-auto mb-4 flex items-center">
                    <h2 class="text-base font-semibold text-gray-700">NO.</h2>
                    <span class="text-base font-semibold text-gray-700 ml-2" id="display-question-number">1</span>
                </div>

                <!-- Container untuk semua pertanyaan -->
                <div id="questions-container">
                    <!-- Soal Pilihan Ganda -->
                    @if (isset($soalPilgans) && $soalPilgans->count() > 0)
                        @foreach ($soalPilgans->sortBy('nomor_soal') as $soal)
                            <div id="question{{ $soal->nomor_soal }}"
                                class="question-content {{ $soal->nomor_soal > 1 ? 'hidden' : '' }}">
                                <article
                                    class="w-full lg:max-w-6xl lg:mx-auto space-y-4 text-sm leading-relaxed text-justify">
                                    <p>{!! $soal->soal !!}</p>
                                    @if ($soal->soal_gambar)
                                        <img src="{{ asset('storage/' . $soal->soal_gambar) }}" alt="Gambar Soal"
                                            class="max-w-full mx-auto">
                                    @endif
                                </article>
                                <div class="w-full lg:max-w-6xl lg:mx-auto mt-6 space-y-3 text-gray-700 text-sm">
                                    @php
                                        $jawabanKey = 'pilgan_' . $soal->id;
                                        $jawabanPeserta = isset($jawabanPesertas[$jawabanKey])
                                            ? $jawabanPesertas[$jawabanKey]
                                            : null;
                                        $jawabanPilihan = $jawabanPeserta ? $jawabanPeserta->jawaban : null;
                                    @endphp

                                    @foreach (['A' => 'jawaban_a', 'B' => 'jawaban_b', 'C' => 'jawaban_c', 'D' => 'jawaban_d', 'E' => 'jawaban_e'] as $option => $field)
                                        @php
                                            $isCorrect = $soal->kunci_jawaban === $option;
                                            $isSelected = $jawabanPilihan === $option;

                                            $borderClass = 'border-gray-200';
                                            $bgClass = '';

                                            if ($isCorrect) {
                                                $borderClass = 'border-green-500';
                                                $bgClass = 'bg-green-50';
                                            } elseif ($isSelected && !$isCorrect) {
                                                $borderClass = 'border-red-500';
                                                $bgClass = 'bg-red-50';
                                            }
                                        @endphp

                                        <div
                                            class="flex items-center space-x-3 border rounded-lg p-3 {{ $borderClass }} {{ $bgClass }}">
                                            <div
                                                class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-full text-gray-500 font-semibold">
                                                {{ $option }}
                                            </div>
                                            <span>{!! $soal->$field !!}</span>
                                        </div>
                                    @endforeach

                                    @if ($jawabanPeserta)
                                        <div class="mt-6 rounded-lg bg-white p-4 shadow-sm sm:p-6">
                                            <div class="flex flex-col gap-4">
                                                <div class="flex items-center justify-between">
                                                    <div
                                                        class="flex items-center gap-2 rounded-full {{ $jawabanPeserta->is_correct ? 'bg-green-100' : 'bg-red-100' }} px-2 py-1 sm:px-3">
                                                        @if ($jawabanPeserta->is_correct)
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" aria-hidden="true"
                                                                class="h-4 w-4 text-green-600 sm:h-5 sm:w-5">
                                                                <path fill-rule="evenodd"
                                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span
                                                                class="text-xs font-medium text-green-700 sm:text-sm">Jawaban
                                                                Benar</span>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" aria-hidden="true"
                                                                class="h-4 w-4 text-red-600 sm:h-5 sm:w-5">
                                                                <path fill-rule="evenodd"
                                                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span
                                                                class="text-xs font-medium text-red-700 sm:text-sm">Jawaban
                                                                Salah</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-3">
                                                    <div
                                                        class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                                        <div class="space-y-2">
                                                            <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                Jawaban Kamu</p>
                                                            <div
                                                                class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                <span
                                                                    class="text-xs font-medium text-gray-800 sm:text-sm">{{ $jawabanPilihan }}</span>
                                                            </div>
                                                        </div>
                                                        @if (!$jawabanPeserta->is_correct)
                                                            <div class="space-y-2">
                                                                <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                    Jawaban Benar</p>
                                                                <div
                                                                    class="inline-flex items-center rounded-md bg-emerald-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                    <span
                                                                        class="text-xs font-medium text-emerald-800 sm:text-sm">{{ $soal->kunci_jawaban }}</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Tampilkan status "Tidak di isi" jika jawaban peserta null -->
                                        <div class="mt-6 rounded-lg bg-white p-4 shadow-sm sm:p-6">
                                            <div class="flex flex-col gap-4">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap-2 rounded-full bg-gray-100 px-2 py-1 sm:px-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" aria-hidden="true"
                                                            class="h-4 w-4 text-gray-600 sm:h-5 sm:w-5">
                                                            <path fill-rule="evenodd"
                                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="text-xs font-medium text-gray-700 sm:text-sm">Tidak di isi</span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-3">
                                                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                                        <div class="space-y-2">
                                                            <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                Jawaban Kamu</p>
                                                            <div class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                <span class="text-xs font-medium text-gray-800 sm:text-sm">-</span>
                                                            </div>
                                                        </div>
                                                        <div class="space-y-2">
                                                            <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                Jawaban Benar</p>
                                                            <div class="inline-flex items-center rounded-md bg-emerald-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                <span class="text-xs font-medium text-emerald-800 sm:text-sm">{{ $soal->kunci_jawaban }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="py-3 text-xl font-semibold">Solusi</div>
                                    <div class="mb-6 rounded-lg border border-gray-200 bg-white p-3 sm:p-6">
                                        <article
                                            class="prose max-w-none overflow-x-auto text-justify lg:prose-lg prose-strong:font-bold prose-pre:overflow-x-auto prose-table:border prose-th:border prose-th:bg-emerald-500 prose-th:p-2 prose-th:font-sans prose-th:text-white prose-td:border prose-td:p-2 prose-img:mx-auto prose-img:max-w-full">
                                            <div class="relative">
                                                <p>Solusi untuk soal ini akan ditambahkan kemudian.</p>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <!-- Soal Esai -->
                    @if (isset($soalEsais) && $soalEsais->count() > 0)
                        @foreach ($soalEsais->sortBy('nomor_soal') as $soal)
                            @php
                                $jawabanKey = 'esai_' . $soal->id;
                                $jawabanPeserta = isset($jawabanPesertas[$jawabanKey])
                                    ? $jawabanPesertas[$jawabanKey]
                                    : null;
                            @endphp

                            <div id="question{{ $soal->nomor_soal }}" class="question-content hidden">
                                <article
                                    class="w-full lg:max-w-6xl lg:mx-auto space-y-4 text-sm leading-relaxed text-justify">
                                    <p>{!! $soal->soal !!}</p>
                                    @if ($soal->soal_gambar)
                                        <img src="{{ asset('storage/' . $soal->soal_gambar) }}" alt="Gambar Soal"
                                            class="max-w-full mx-auto">
                                    @endif
                                </article>
                                <div class="w-full lg:max-w-6xl lg:mx-auto mt-6 space-y-2 text-gray-700 text-sm">
                                    <p>Isian Singkat</p>

                                    @if ($jawabanPeserta)
                                        <div class="mt-6 rounded-lg bg-white p-4 shadow-sm sm:p-6">
                                            <div class="flex flex-col gap-4">
                                                <div class="flex items-center justify-between">
                                                    <div
                                                        class="flex items-center gap-2 rounded-full {{ $jawabanPeserta->is_correct ? 'bg-green-100' : 'bg-red-100' }} px-2 py-1 sm:px-3">
                                                        @if ($jawabanPeserta->is_correct)
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                aria-hidden="true"
                                                                class="h-4 w-4 text-green-600 sm:h-5 sm:w-5">
                                                                <path fill-rule="evenodd"
                                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span
                                                                class="text-xs font-medium text-green-700 sm:text-sm">Jawaban
                                                                Benar</span>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                aria-hidden="true"
                                                                class="h-4 w-4 text-red-600 sm:h-5 sm:w-5">
                                                                <path fill-rule="evenodd"
                                                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span
                                                                class="text-xs font-medium text-red-700 sm:text-sm">Jawaban
                                                                Salah</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-3">
                                                    <div
                                                        class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                                        <div class="space-y-2">
                                                            <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                Jawaban Kamu</p>
                                                            <div
                                                                class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                <span
                                                                    class="text-xs font-medium text-gray-800 sm:text-sm">{{ $jawabanPeserta->jawaban }}</span>
                                                            </div>
                                                        </div>
                                                        @if (!$jawabanPeserta->is_correct)
                                                            <div class="space-y-2">
                                                                <p
                                                                    class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                    Jawaban Benar</p>
                                                                <div
                                                                    class="inline-flex items-center rounded-md bg-emerald-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                    <span
                                                                        class="text-xs font-medium text-emerald-800 sm:text-sm">{{ $soal->kunci_jawaban }}</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Tampilkan status "Tidak di isi" jika jawaban peserta null -->
                                        <div class="mt-6 rounded-lg bg-white p-4 shadow-sm sm:p-6">
                                            <div class="flex flex-col gap-4">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap-2 rounded-full bg-gray-100 px-2 py-1 sm:px-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" aria-hidden="true"
                                                            class="h-4 w-4 text-gray-600 sm:h-5 sm:w-5">
                                                            <path fill-rule="evenodd"
                                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="text-xs font-medium text-gray-700 sm:text-sm">Tidak di isi</span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-3">
                                                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                                        <div class="space-y-2">
                                                            <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                Jawaban Kamu</p>
                                                            <div class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                <span class="text-xs font-medium text-gray-800 sm:text-sm">-</span>
                                                            </div>
                                                        </div>
                                                        <div class="space-y-2">
                                                            <p class="text-xs font-medium text-gray-500 sm:text-sm">
                                                                Jawaban Benar</p>
                                                            <div class="inline-flex items-center rounded-md bg-emerald-100 px-2 py-1 sm:px-3 sm:py-1.5">
                                                                <span class="text-xs font-medium text-emerald-800 sm:text-sm">{{ $soal->kunci_jawaban }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="py-3 text-xl font-semibold">Solusi</div>
                                    <div class="mb-6 rounded-lg border border-gray-200 bg-white p-3 sm:p-6">
                                        <article
                                            class="prose max-w-none overflow-x-auto text-justify lg:prose-lg prose-strong:font-bold prose-pre:overflow-x-auto prose-table:border prose-th:border prose-th:bg-emerald-500 prose-th:p-2 prose-th:font-sans prose-th:text-white prose-td:border prose-td:p-2 prose-img:mx-auto prose-img:max-w-full">
                                            <div class="relative">
                                                <p>Solusi untuk soal esai ini akan ditambahkan kemudian.</p>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
                                style="margin-left: 18rem; min-width: 120px; max-width: 160px; z-index: 10; position: relative;"
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
        @endif
    </main>

    <script src="{{ asset('js/pembahasan.js') }}"></script>
</body>

</html>