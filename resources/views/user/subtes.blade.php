<x-layout>
    <div class="flex flex-col xl:flex-row">
        <aside
            class="border-b border-gray-200 bg-white xl:w-80 xl:shrink-0 xl:border-b-0 xl:border-r xl:border-gray-200">
            <div class="h-full py-6 pl-4 pr-6 sm:pl-6 lg:pl-8 xl:pl-0">
                <header class="py-3 max-w-full">
                    <div class="mx-auto max-w-7xl md:items-center md:justify-between">
                        <div class="space-y-3 ml-6">
                            <h1 class="flex flex-wrap items-center text-3xl font-semibold leading-9">
                                {{ $tryout->judul_paket }}
                            </h1>
                            <p class="to-text-body mt-2 text-gray-700">
                                Try Out untuk mempersiapkan UTBK-SNBT 2025
                            </p>
                            <span
                                class="inline-flex items-start space-x-3 rounded-md border border-blue-200 px-2 py-1 text-sm font-semibold text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="mr-1 h-5 w-5 text-blue-500">
                                    <path
                                        d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Bisa dikerjakan kapan saja</span>
                            </span>
                            <span
                                class="text-blue-500 inline-flex items-center rounded-md px-2 py-1 text-sm font-medium ring-1 ring-inset ring-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                    class="mr-1 h-5 w-5 text-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z">
                                    </path>
                                </svg>
                                @if ($pesertaCount > 0)
                                    {{ $pesertaCount }} Peserta
                                @else
                                    0 peserta
                                @endif
                            </span>
                        </div>
                    </div>
                </header>
            </div>
        </aside>

        <div class="lg:min-w-0 lg:flex-1">
            <div class="h-full px-4 pb-24 pt-6 sm:px-6 sm:pb-16 lg:px-8">
                <div class="space-y-6 rounded-lg sm:px-3">
                    @if ($allSubtesCompleted)
                        <div>
                            <div
                                class="mb-5 overflow-hidden rounded-lg bg-gradient-to-r from-emerald-600 to-emerald-500 shadow-md dark:from-emerald-700 dark:to-emerald-600">
                                <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
                                    <div
                                        class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
                                        <div class="flex items-center">
                                            <span
                                                class="flex rounded-lg bg-white/20 p-2.5 backdrop-blur-sm dark:bg-white/10"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true" data-slot="icon"
                                                    class="h-6 w-6 text-white">
                                                    <path fill-rule="evenodd"
                                                        d="M4.5 2A1.5 1.5 0 0 0 3 3.5v13A1.5 1.5 0 0 0 4.5 18h11a1.5 1.5 0 0 0 1.5-1.5V7.621a1.5 1.5 0 0 0-.44-1.06l-4.12-4.122A1.5 1.5 0 0 0 11.378 2H4.5Zm2.25 8.5a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 3a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z"
                                                        clip-rule="evenodd"></path>
                                                </svg></span>
                                            <div class="ml-4">
                                                <h3 class="font-semibold text-white dark:text-neutral-50">
                                                    <span class="md:hidden">Hasil try out sudah tersedia!</span><span
                                                        class="hidden md:inline">Hasil Try Out kamu sudah
                                                        tersedia!</span>
                                                </h3>
                                                <p class="text-sm text-emerald-100 dark:text-emerald-200">
                                                    Lihat hasil dan analisis performa kamu
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row">
                                            <div x-data="{
                                                showModal: false,
                                                async resetTryout() {
                                                    try {
                                                        const response = await fetch('{{ route('tryout.reset', $tryout->id) }}', {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/json',
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                            }
                                                        });
                                            
                                                        if (response.ok) {
                                                            window.location.reload();
                                                        } else {
                                                            alert('Gagal mereset tryout');
                                                        }
                                                    } catch (error) {
                                                        console.error('Error:', error);
                                                        alert('Terjadi kesalahan');
                                                    }
                                                }
                                            }">
                                                <button @click="showModal = true"
                                                    class="justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 dark:focus-visible:ring-slate-300 shadow-sm dark:text-slate-50 h-9 px-4 py-2 flex items-center gap-1.5 border-none bg-white/20 text-white hover:bg-white/30 dark:bg-white/10 dark:hover:bg-white/20">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" aria-hidden="true" data-slot="icon"
                                                        class="h-4 w-4">
                                                        <path fill-rule="evenodd"
                                                            d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Ulang Try Out
                                                </button>

                                                <div x-cloak x-show="showModal"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    class="fixed inset-0 z-50 flex items-center justify-center p-4">
                                                    <div class="fixed inset-0 bg-black/20 backdrop-blur-sm transition-opacity"
                                                        @click="showModal = false"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0">
                                                    </div>

                                                    <div class="relative z-10 w-full max-w-md rounded-lg bg-white shadow-lg"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        @click.stop>
                                                        <div class="space-y-4 p-6">
                                                            <div role="alert"
                                                                class="relative w-full rounded-lg border px-4 py-3 text-sm border-red-500/50 text-red-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="lucide lucide-circle-alert h-4 w-4">
                                                                    <circle cx="12" cy="12" r="10">
                                                                    </circle>
                                                                    <line x1="12" x2="12" y1="8"
                                                                        y2="12"></line>
                                                                    <line x1="12" x2="12.01"
                                                                        y1="16" y2="16"></line>
                                                                </svg>
                                                                <h5
                                                                    class="mb-1 font-medium leading-none tracking-tight">
                                                                    Perhatian</h5>
                                                                <div class="text-sm">
                                                                    Semua jawaban dan progres Try Out kamu akan dihapus.
                                                                    Tindakan ini tidak dapat dibatalkan.
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2">
                                                                <button @click="showModal = false"
                                                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 dark:focus-visible:ring-slate-300 border border-slate-200 bg-white shadow-sm hover:bg-slate-100 hover:text-slate-900 h-9 px-4 py-2">
                                                                    Batal
                                                                </button>
                                                                <button @click="resetTryout()"
                                                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 dark:focus-visible:ring-slate-300 bg-red-500 text-slate-50 shadow-sm hover:bg-red-500/90 h-9 px-4 py-2 min-w-[140px]">
                                                                    Ya, Ulang Try Out
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a class="flex items-center justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-emerald-700 shadow-sm transition-colors hover:bg-emerald-50 dark:bg-neutral-100 dark:text-emerald-700 dark:hover:bg-neutral-200"
                                                href="{{ route('tryout.result', ['tryout' => $tryout->id]) }}">Lihat
                                                Hasil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-6">
                        <div class="rounded-lg border bg-white shadow-sm dark:border-gray-800 dark:bg-neutral-800">
                            <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                                <h3 class="font-medium text-gray-900 dark:text-gray-100">
                                    Subtes Try Out
                                </h3>
                            </div>
                            @foreach ($subtes as $index => $item)
                                <div class="divide-y divide-gray-100">
                                    <article
                                        class="flex items-center justify-between p-3 sm:px-5 {{ $currentSubtes == $item->id ? 'bg-blue-50' : 'bg-white' }}"
                                        aria-label="Subtest {{ $index + 1 }} {{ $item->judul_subtes }}">
                                        <div class="flex items-center gap-3">
                                            <div class="relative flex items-center justify-center">
                                                <div
                                                    class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full border-2 
                                                {{ $subtesStatus[$item->id] === 'selesai' ? 'border-green-500 bg-green-50' : 'border-blue-500 bg-blue-50' }}">
                                                    @if ($subtesStatus[$item->id] === 'selesai')
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-green-600" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <span
                                                            class="text-sm font-medium {{ $subtesStatus[$item->id] === 'selesai' ? 'text-green-600' : 'text-blue-600' }}">
                                                            {{ $index + 1 }}
                                                        </span>
                                                    @endif
                                                </div>
                                                @if ($index + 1 !== count($subtes))
                                                    <div
                                                        class="absolute -bottom-12 left-1/2 top-1/2 w-0.5 -translate-x-1/2 bg-blue-200">
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <h4
                                                    class="text-sm font-medium sm:text-base {{ $subtesStatus[$item->id] === 'selesai' ? 'text-green-500' : 'text-blue-700' }}">
                                                    {{ $item->judul_subtes }}
                                                </h4>
                                                <div
                                                    class="mt-1 flex items-center gap-3 text-xs {{ $subtesStatus[$item->id] === 'selesai' ? 'text-green-500' : 'text-blue-500' }}">
                                                    <span class="flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-clock h-3.5 w-3.5" aria-hidden="true"
                                                            focusable="false">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg>
                                                        {{ \Carbon\CarbonInterval::seconds($item->timer)->cascade()->format('%I') }}
                                                        menit
                                                    </span>
                                                    <span class="flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true"
                                                            class="h-3.5 w-3.5" focusable="false">
                                                            <path fill-rule="evenodd"
                                                                d="M4.5 2A1.5 1.5 0 0 0 3 3.5v13A1.5 1.5 0 0 0 4.5 18h11a1.5 1.5 0 0 0 1.5-1.5V7.621a1.5 1.5 0 0 0-.44-1.06l-4.12-4.122A1.5 1.5 0 0 0 11.378 2H4.5Zm2.25 8.5a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 3a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        {{ $createdQuestionCounts[$item->id] }} soal
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            @if ($subtesStatus[$item->id] === 'selesai')
                                                <span
                                                    class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-600">
                                                    Selesai
                                                </span>
                                            @elseif($currentSubtes == $item->id)
                                                <a href="{{ url('/tryout/' . $tryout->id . '/' . $item->id) }}/exam">
                                                    <button type="button"
                                                        class="inline-flex items-center justify-center whitespace-nowrap transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-950 disabled:pointer-events-none disabled:opacity-50 shadow rounded-md px-3 h-8 bg-blue-600 text-xs font-medium text-white hover:bg-blue-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-play mr-1.5 h-3.5 w-3.5"
                                                            aria-hidden="true" focusable="false">
                                                            <polygon points="6 3 20 12 6 21 6 3"></polygon>
                                                        </svg>
                                                        Kerjakan
                                                    </button>
                                                </a>
                                            @else
                                                <span
                                                    class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">
                                                    Menunggu
                                                </span>
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
