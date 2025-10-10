<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leaderboard - {{ $tryout->judul }}</title>
    
    <link rel="icon" href="{{ Vite::asset('resources/img/logo_campnova_blue_f.png') }}" type="image/png">

    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>

    <style>
        .hidden-item {
            display: none;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white font-[Inter,sans-serif] min-h-screen flex flex-col">
    <x-navbar></x-navbar>
    <main class="flex-grow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 mt-4 pt-8">
            <div class="py-5">
                <div class="m-auto max-w-5xl rounded-3xl bg-white shadow-lg">
                    <div class="p-6">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold">
                                Leaderboard {{ $tryout->judul }}
                            </h2>
                            <p class="text-sm text-gray-500">Total Peserta: {{ $totalParticipants }}</p>
                        </div>
                        <form class="mb-6 flex gap-2" onsubmit="return false">
                            <div class="relative flex-1">
                                <input id="searchInput"
                                    class="flex h-9 w-full rounded-md border border-slate-200 bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-slate-950 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 md:text-sm pr-10"
                                    type="text" placeholder="Cari nama peserta..." oninput="filterParticipants()"
                                    autocomplete="off" />
                            </div>
                        </form>
                        <div class="space-y-2" id="participantsContainer">
                            @foreach ($participants as $index => $participant)
                                @php
                                    $rank = $index + 1;
                                    $bgColor = '';
                                    $borderColor = '';
                                    $textColor = '';
                                    $medal = '';

                                    if ($rank === 1) {
                                        $bgColor = 'bg-yellow-500';
                                        $borderColor = 'border-yellow-400';
                                        $textColor = 'text-yellow-700';
                                        $scoreColor = 'text-yellow-600';
                                        $medal = '🥇';
                                    } elseif ($rank === 2) {
                                        $bgColor = 'bg-gray-500';
                                        $borderColor = 'border-gray-400';
                                        $textColor = 'text-gray-700';
                                        $scoreColor = 'text-gray-600';
                                        $medal = '🥈';
                                    } elseif ($rank === 3) {
                                        $bgColor = 'bg-orange-400';
                                        $borderColor = 'border-orange-400';
                                        $textColor = 'text-orange-700';
                                        $scoreColor = 'text-orange-600';
                                        $medal = '🥉';
                                    } else {
                                        $bgColor = 'bg-gray-200';
                                        $borderColor = '';
                                        $textColor = 'text-gray-800';
                                        $scoreColor = 'text-gray-800';
                                        $medal = $rank;
                                    }
                                @endphp

                                <div
                                    class="shadow-xs mb-2 w-full rounded-lg bg-white transition-all duration-300 hover:shadow-md @if ($rank <= 3) border-2 {{ $borderColor }} @endif participant-item">
                                    <div
                                        class="flex items-center rounded-lg p-4 @if ($rank <= 3) bg-gradient-to-r from-{{ explode('-', $bgColor)[1] }}-100 @endif">
                                        <div
                                            class="h-12 w-12 shrink-0 {{ $bgColor }} flex items-center justify-center rounded-full text-lg font-bold text-white">
                                            {{ $medal }}
                                        </div>
                                        <div class="ml-4 grow">
                                            <div class="flex items-center">
                                                <span class="font-semibold {{ $textColor }} participant-name">
                                                    {{ $participant->user->nama_panjang }}
                                                </span>
                                            </div>
                                            <div class="mt-1 text-sm text-gray-600">
                                                {{ optional($participant->user->pilihanJurusan)->perguruan_tinggi1 ?? 'Belum memilih' }}
                                                •
                                                {{ optional($participant->user->pilihanJurusan)->program_studi1 ?? 'jurusan' }}
                                            </div>
                                        </div>
                                        <div class="shrink-0 text-right">
                                            <span
                                                class="text-lg font-bold {{ $scoreColor }}">{{ number_format($participant->total_score, 2) }}</span>
                                            <div class="text-xs text-gray-500">Score</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>

    <script>
        function filterParticipants() {
            const searchInput = document.getElementById("searchInput");
            const searchTerm = searchInput.value.toLowerCase();
            const participantItems = document.querySelectorAll(".participant-item");

            participantItems.forEach((item) => {
                const nameElement = item.querySelector(".participant-name");
                const name = nameElement.textContent.toLowerCase();

                if (name.includes(searchTerm)) {
                    item.classList.remove("hidden-item");
                } else {
                    item.classList.add("hidden-item");
                }
            });
        }
    </script>
</body>

</html>
