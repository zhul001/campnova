<x-profilelayout>
    <!-- Notifikasi Area -->
    <div id="notification" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-white border border-gray-200 px-6 py-4 rounded-lg relative shadow-lg max-w-sm" role="alert">
            <div class="flex items-start">
                <div id="notificationIcon" class="mr-3 mt-0.5 flex-shrink-0"></div>
                <div class="flex-1">
                    <h3 id="notificationTitle" class="font-semibold text-gray-900"></h3>
                    <p id="notificationMessage" class="mt-1 text-sm text-gray-600"></p>
                </div>
                <button id="closeNotification" class="ml-4 flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
        <div class="relative top-20 mx-auto p-5 w-96">
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center">
                <div id="lottieContainer" class="h-32 w-32"></div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Menyimpan...</h3>
                <p class="text-sm text-gray-500 mt-1">Sedang menyimpan pilihan jurusan Anda</p>
            </div>
        </div>
    </div>

    <form id="majorForm" action="{{ route('profile.major') }}" method="POST">
        @csrf
        @method('PUT')

        <section aria-labelledby="major_heading" class="p-4 sm:p-6">
            <div id="choicesContainer" class="border shadow border-gray-300 sm:overflow-visible sm:rounded-md bg-white">
                <div class="px-2 py-5 sm:p-6">
                    <div class="rounded-lg">
                        <main class="bg-white">
                            <div class="px-4 py-5 sm:p-6">
                                <div id="choicesList" class="space-y-6">
                                    @foreach ([1, 2, 3, 4] as $i)
                                        @php
                                            $hasData =
                                                !empty($pilihan->{'perguruan_tinggi' . $i}) ||
                                                !empty($pilihan->{'program_studi' . $i});
                                            $shouldShow = $i === 1 || $hasData;
                                        @endphp
                                        <div class="choice-item rounded-lg border border-gray-200 bg-white p-4 shadow-sm transition-shadow hover:shadow-md sm:p-6 {{ !$shouldShow ? 'hidden' : '' }}"
                                            data-choice="{{ $i }}">
                                            <div
                                                class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                                <div
                                                    class="flex flex-col space-y-2 sm:flex-row sm:items-center sm:space-x-2 sm:space-y-0">
                                                    <h2
                                                        class="choice-heading text-xl font-semibold text-gray-900 sm:text-2xl">
                                                        Pilihan {{ $i }}
                                                    </h2>
                                                </div>
                                                @if ($i > 1)
                                                    <button type="button"
                                                        class="delete-choice mt-2 flex items-center text-red-600 hover:text-red-800 sm:mt-0"
                                                        aria-label="Hapus Pilihan">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            aria-hidden="true" class="mr-1 h-5 w-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                        <span>Hapus</span>
                                                    </button>
                                                @endif
                                            </div>

                                            <div class="mb-4 relative">
                                                <label class="mb-2 block text-sm font-medium text-gray-700">Perguruan
                                                    Tinggi</label>
                                                <div
                                                    class="labelBox flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 cursor-pointer">
                                                    <input type="hidden" name="perguruan_tinggi{{ $i }}"
                                                        value="{{ old('perguruan_tinggi' . $i, $pilihan->{'perguruan_tinggi' . $i} ?? '') }}">
                                                    <input type="text"
                                                        class="searchInput bg-transparent outline-none text-sm text-gray-700"
                                                        autocapitalize="none" autocomplete="off" autocorrect="off"
                                                        spellcheck="false" tabindex="0" style="width: 1ch" />
                                                    <span
                                                        class="selectedText text-sm text-gray-700 truncate block max-w-[180px] {{ empty($pilihan->{'perguruan_tinggi' . $i}) ? 'hidden' : '' }}">
                                                        {{ $pilihan->{'perguruan_tinggi' . $i} ?? '' }}
                                                    </span>
                                                    <div class="flex items-center ml-auto">
                                                        <span class="h-5 w-px bg-gray-300"></span>
                                                        <div aria-hidden="true" class="ml-2">
                                                            <svg height="20" width="20" viewBox="0 0 20 20"
                                                                aria-hidden="true" focusable="false"
                                                                class="text-gray-500">
                                                                <path
                                                                    d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span
                                                    class="inputMirror text-sm font-normal absolute top-[-9999px] left-[-9999px] whitespace-pre"></span>
                                                <x-perguruan-tinggi-list />
                                            </div>

                                            <div class="relative">
                                                <label class="mb-2 block text-sm font-medium text-gray-700">Program
                                                    Studi</label>
                                                <div
                                                    class="labelBoxProdi flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 cursor-pointer">
                                                    <input type="hidden" name="program_studi{{ $i }}"
                                                        value="{{ old('program_studi' . $i, $pilihan->{'program_studi' . $i} ?? '') }}">
                                                    <input type="text"
                                                        class="searchInputProdi bg-transparent outline-none text-sm text-gray-700"
                                                        autocapitalize="none" autocomplete="off" autocorrect="off"
                                                        spellcheck="false" tabindex="0" style="width: 1ch" />
                                                    <span
                                                        class="selectedProdi text-sm text-gray-700 truncate block max-w-[180px] {{ empty($pilihan->{'program_studi' . $i}) ? 'hidden' : '' }}">
                                                        {{ $pilihan->{'program_studi' . $i} ?? '' }}
                                                    </span>
                                                    <div class="flex items-center ml-auto">
                                                        <span class="h-5 w-px bg-gray-300"></span>
                                                        <div aria-hidden="true" class="ml-2">
                                                            <svg height="20" width="20" viewBox="0 0 20 20"
                                                                aria-hidden="true" focusable="false"
                                                                class="text-gray-500">
                                                                <path
                                                                    d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span
                                                    class="inputMirrorProdi text-sm font-normal absolute top-[-9999px] left-[-9999px] whitespace-pre"></span>
                                                <ul class="dropdownListProdi absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md border border-gray-300 bg-gray-100 py-1 text-base shadow-lg sm:text-sm hidden"
                                                    role="listbox">
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div id="addChoiceWrapper"
                                    class="mt-6 flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                                    <button id="addChoiceBtn"
                                        class="inline-flex flex-row px-4 py-2 text-sm rounded-md items-center justify-center border border-transparent font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-75 w-full"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="mr-2 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Tambah Pilihan
                                    </button>
                                </div>

                                <div class="border-b border-gray-200"></div>

                                <div
                                    class="mt-6 flex flex-col-reverse space-y-4 space-y-reverse sm:flex-row sm:items-center sm:justify-end sm:space-x-3 sm:space-y-0">
                                    <button
                                        class="inline-flex flex-row px-4 py-2 text-sm rounded-md items-center justify-center border bg-white font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-75 w-full sm:w-auto"
                                        type="button" onclick="window.history.back();" fdprocessedid="oqnl35"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="mr-2 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
                                        </svg>Kembali</button>
                                    <button id="submitButton"
                                        class="inline-flex flex-row px-4 py-2 text-sm rounded-md items-center justify-center border border-transparent font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-75 w-full sm:w-auto"
                                        type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="mr-2 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        <span id="submitText">Simpan Pilihan</span>
                                        <span id="submitLoading" class="hidden">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            Menyimpan...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </section>
    </form>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
        <script src="{{ asset('js/major.js') }}"></script>
    @endpush
</x-profilelayout>