<x-layout>
    <div class="sm:py-5">
        <div class="m-auto max-w-4xl rounded-3xl bg-white shadow-lg dark:bg-neutral-800">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="overflow-hidden bg-gradient-to-br from-emerald-400 to-emerald-600 sm:rounded-t-2xl">
                            <div class="py-4">
                                <div class="flex flex-col items-center justify-center text-white">
                                    <span
                                        class="mb-2 inline-flex items-center rounded-md bg-green-50 px-3 py-1 text-sm font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                        {{ $tryout->judul_paket }}
                                    </span>
                                    <div
                                        class="text-center text-lg font-medium dark:text-neutral-100 sm:text-xl md:text-2xl">
                                        {{ $user->nama_panjang }}
                                    </div>
                                    <div class="mt-2 text-center">
                                        <div class="text-6xl font-bold text-white">
                                            {{ number_format($hasilTryout->total_score, 2) }}
                                        </div>
                                        <span class="text-md font-medium text-white opacity-90">Nilai rata-rata</span>
                                    </div>
                                    <div class="mt-4 w-full max-w-xl px-3">
                                        <div
                                            class="grid grid-cols-3 gap-2 rounded-xl border border-white/15 bg-white/15 p-3 shadow backdrop-blur-lg md:gap-3">
                                            <div class="flex flex-col items-center space-y-1 text-center">
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100/90 shadow-sm ring-1 ring-green-200/50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" class="h-5 w-5 text-green-600">
                                                        <path d="M5 13l4 4L19 7" stroke="currentColor"
                                                            stroke-width="2.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-xl font-bold text-white">
                                                    {{ $hasilTryout->total_benar }}
                                                </span>
                                                <span class="text-xs font-medium text-white/80">Benar</span>
                                            </div>
                                            <div class="flex flex-col items-center space-y-1 text-center">
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100/90 shadow-sm ring-1 ring-red-200/50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" class="h-5 w-5 text-red-600">
                                                        <path d="M18 6L6 18M6 6l12 12" stroke="currentColor"
                                                            stroke-width="2.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-xl font-bold text-white">
                                                    {{ $hasilTryout->total_salah }}
                                                </span>
                                                <span class="text-xs font-medium text-white/80">Salah</span>
                                            </div>
                                            <div class="flex flex-col items-center space-y-1 text-center">
                                                <div
                                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-100/90 shadow-sm ring-1 ring-gray-200/50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="h-5 w-5 text-gray-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span class="text-xl font-bold text-white">
                                                    {{ $hasilTryout->total_tidak_diisi }}
                                                </span>
                                                <span class="text-xs font-medium text-white/80">Kosong</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-3">
                        <div class="my-3 flex items-end">
                            <div>
                                <div
                                    class="text-2xl font-semibold leading-8 text-emerald-600 dark:text-emerald-400 md:text-3xl">
                                    Rank {{ number_format($rank) }}
                                </div>
                            </div>
                            <span
                                class="ml-2 text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 md:text-xl">
                                dari {{ number_format($totalParticipants) }} peserta
                            </span>
                        </div>
                        <div class="mb-6 mt-4">
                            <a class="inline-flex w-full items-center justify-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600"
                                href="{{ route('tryout.leaderboard', ['tryoutId' => $tryout->id]) }}">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    class="mr-2 h-5 w-5" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M16 11V3H8v6H2v12h20V11h-6zm-6-6h4v14h-4V5zm-6 6h4v8H4v-8zm16 8h-4v-6h4v6z">
                                    </path>
                                </svg>
                                Lihat Leaderboard
                            </a>
                        </div>

                        @foreach ($hasilSubtes as $hasil)
                            <div
                                class="mt-4 rounded-lg border bg-white p-4 transition-all hover:shadow-md dark:border-neutral-800 dark:bg-neutral-900">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3
                                            class="text-base font-semibold text-gray-800 dark:text-neutral-100 sm:text-lg">
                                            {{ $hasil->subtes->judul_subtes }}
                                        </h3>
                                        <div
                                            class="mt-1 flex items-center text-xs text-gray-600 dark:text-neutral-400 sm:text-sm">
                                            <span>Benar: </span>
                                            <span
                                                class="ml-1 font-medium">{{ $hasil->benar }}/{{ $hasil->benar + $hasil->salah + $hasil->tidak_diisi }}</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold sm:text-3xl"
                                            style="color: {{ $hasil->score < 500 ? 'rgb(239, 68, 68)' : ($hasil->score < 600 ? 'rgb(234, 179, 8)' : 'rgb(34, 197, 94)') }}">
                                            {{ number_format($hasil->score, 2) }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-neutral-500">
                                            Skor
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('pembahasan.show', ['tryout_id' => $tryout->id, 'subtes_id' => $hasil->subtes_id]) }}"
                                    class="flex flex-row px-4 py-2 text-sm rounded-md items-center justify-center border border-transparent font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 text-green-700 bg-green-100 hover:bg-green-200 focus:ring-green-500 disabled:cursor-not-allowed disabled:opacity-75 my-3 w-full uppercase">
                                    Lihat Pembahasan
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
