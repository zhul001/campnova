<x-profilelayout>
    <!-- Notifikasi Area -->
    <div id="notification" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-white border border-gray-300 text-gray-800 px-4 py-3 rounded relative shadow-lg" role="alert">
            <strong class="font-bold" id="notificationTitle">Sukses!</strong>
            <span id="notificationMessage" class="block sm:inline">Pilihan berhasil disimpan.</span>
            <button id="closeNotification" class="absolute top-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-gray-600" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                    <svg class="animate-spin h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Menyimpan...</h3>
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
                                                    <span
                                                        class="selectedText text-sm text-gray-700 {{ empty($pilihan->{'perguruan_tinggi' . $i}) ? 'hidden' : '' }}">
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
                                                    <span
                                                        class="selectedProdi text-sm text-gray-700 {{ empty($pilihan->{'program_studi' . $i}) ? 'hidden' : '' }}">
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
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                            class="mr-2 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Tambah Pilihan
                                    </button>
                                </div>

                                <div class="border-b border-gray-200"></div>

                                <div
                                    class="mt-6 flex flex-col-reverse space-y-4 space-y-reverse sm:flex-row sm:items-center sm:justify-end sm:space-x-3 sm:space-y-0">
                                    <button id="submitButton"
                                        class="inline-flex flex-row px-4 py-2 text-sm rounded-md items-center justify-center border border-transparent font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-75 w-full sm:w-auto"
                                        type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                            class="mr-2 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        <span id="submitText">Simpan Pilihan</span>
                                        <span id="submitLoading" class="hidden">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
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
        <script src="{{ asset('js/major.js') }}"></script>
    @endpush
</x-profilelayout>

document.addEventListener("DOMContentLoaded", function () {
    // Data Program Studi
    const prodiData = {
        ui: [
            "Teknik Informatika",
            "Sistem Informasi",
            "Manajemen",
            "Akuntansi",
        ],
        itb: [
            "Teknik Informatika",
            "Teknik Elektro",
            "Arsitektur",
            "Teknik Sipil",
        ],
        ugm: ["Teknik Informatika", "Sistem Informasi", "Kedokteran", "Hukum"],
    };

    const choicesList = document.getElementById("choicesList");
    const addChoiceBtn = document.getElementById("addChoiceBtn");
    const majorForm = document.getElementById("majorForm");
    const submitButton = document.getElementById("submitButton");
    const submitText = document.getElementById("submitText");
    const submitLoading = document.getElementById("submitLoading");
    const notification = document.getElementById("notification");
    const notificationTitle = document.getElementById("notificationTitle");
    const notificationMessage = document.getElementById("notificationMessage");
    const closeNotification = document.getElementById("closeNotification");
    const loadingOverlay = document.getElementById("loadingOverlay");

    // Notification functions
    function showNotification(type, message, title = 'Sukses!') {
        // Reset notification classes
        notification.className = 'fixed top-4 right-4 z-50';
        notification.innerHTML = '';
        
        let bgColor, borderColor, textColor, icon;
        
        switch(type) {
            case 'success':
                bgColor = 'bg-green-100';
                borderColor = 'border-green-400';
                textColor = 'text-green-700';
                icon = `<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>`;
                break;
            case 'error':
                bgColor = 'bg-red-100';
                borderColor = 'border-red-400';
                textColor = 'text-red-700';
                title = 'Error!';
                icon = `<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>`;
                break;
            case 'warning':
                bgColor = 'bg-yellow-100';
                borderColor = 'border-yellow-400';
                textColor = 'text-yellow-700';
                title = 'Peringatan!';
                icon = `<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>`;
                break;
        }

        notification.innerHTML = `
            <div class="${bgColor} ${borderColor} ${textColor} px-4 py-3 rounded relative shadow-lg transition-all duration-300 transform translate-x-full" role="alert" id="notificationContent">
                <div class="flex items-center">
                    ${icon}
                    <div>
                        <strong class="font-bold">${title}</strong>
                        <span class="block sm:inline">${message}</span>
                    </div>
                </div>
                <button class="absolute top-3 right-3 ${textColor} hover:opacity-70 transition-opacity" id="closeNotificationBtn">
                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </button>
            </div>
        `;

        // Show notification with animation
        setTimeout(() => {
            const content = document.getElementById('notificationContent');
            content.classList.remove('translate-x-full');
        }, 100);

        // Auto hide after 5 seconds
        const autoHide = setTimeout(() => {
            hideNotification();
        }, 5000);

        // Close button event
        document.getElementById('closeNotificationBtn').addEventListener('click', () => {
            clearTimeout(autoHide);
            hideNotification();
        });
    }

    function hideNotification() {
        const content = document.getElementById('notificationContent');
        if (content) {
            content.classList.add('translate-x-full');
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 300);
        }
    }

    // Loading functions
    function showLoading() {
        loadingOverlay.classList.remove('hidden');
        submitText.classList.add('hidden');
        submitLoading.classList.remove('hidden');
        submitButton.disabled = true;
    }

    function hideLoading() {
        loadingOverlay.classList.add('hidden');
        submitText.classList.remove('hidden');
        submitLoading.classList.add('hidden');
        submitButton.disabled = false;
    }

    // Initialize all choice items
    function initializeChoices() {
        const choiceItems = document.querySelectorAll(".choice-item");

        choiceItems.forEach((item) => {
            initChoiceItem(item);

            // Show choice if it has data or is first choice
            const choiceNumber = item.dataset.choice;
            const ptInput = item.querySelector(
                `input[name="perguruan_tinggi${choiceNumber}"]`
            );
            const prodiInput = item.querySelector(
                `input[name="program_studi${choiceNumber}"]`
            );

            if (choiceNumber === "1" || ptInput.value || prodiInput.value) {
                item.classList.remove("hidden");
            }
        });

        updateChoiceHeadings();
        updateAddButtonVisibility();
    }

    // Initialize a single choice item
    function initChoiceItem(choiceItem) {
        const labelBox = choiceItem.querySelector(".labelBox");
        const selectedText = choiceItem.querySelector(".selectedText");
        const dropdownList = choiceItem.querySelector(".dropdownList");
        const allOptions = dropdownList.querySelectorAll("li");

        const labelBoxProdi = choiceItem.querySelector(".labelBoxProdi");
        const selectedProdi = choiceItem.querySelector(".selectedProdi");
        const dropdownListProdi =
            choiceItem.querySelector(".dropdownListProdi");

        let selectedId = "";

        // Perguruan Tinggi functions
        function toggleDropdown() {
            dropdownList.classList.toggle("hidden");
        }

        function selectOption(el) {
            selectedId = el.getAttribute("data-id");
            selectedText.textContent = el.textContent;
            selectedText.classList.remove("hidden");
            dropdownList.classList.add("hidden");

            // Update hidden input
            const choiceNumber = choiceItem.dataset.choice;
            choiceItem.querySelector(
                `input[name="perguruan_tinggi${choiceNumber}"]`
            ).value = el.textContent;

            // Populate Prodi dropdown
            populateProdiDropdown(selectedId);
        }

        // Program Studi functions
        function toggleDropdownProdi() {
            if (!selectedId) {
                showNotification('warning', 'Pilih Perguruan Tinggi terlebih dahulu');
                return;
            }
            dropdownListProdi.classList.toggle("hidden");
        }

        function selectOptionProdi(el) {
            selectedProdi.textContent = el.textContent;
            selectedProdi.classList.remove("hidden");
            dropdownListProdi.classList.add("hidden");

            // Update hidden input
            const choiceNumber = choiceItem.dataset.choice;
            choiceItem.querySelector(
                `input[name="program_studi${choiceNumber}"]`
            ).value = el.textContent;
        }

        function populateProdiDropdown(ptId) {
            dropdownListProdi.innerHTML = "";

            if (prodiData[ptId]) {
                prodiData[ptId].forEach((prodi) => {
                    const li = document.createElement("li");
                    li.className =
                        "cursor-pointer select-none py-2 px-3 hover:bg-gray-200";
                    li.textContent = prodi;
                    li.addEventListener("click", () => selectOptionProdi(li));
                    dropdownListProdi.appendChild(li);
                });
            }
        }

        // Event listeners
        labelBox.addEventListener("click", toggleDropdown);
        labelBoxProdi.addEventListener("click", toggleDropdownProdi);

        allOptions.forEach((li) => {
            li.addEventListener("click", () => selectOption(li));
        });

        // Close dropdowns when clicking outside
        document.addEventListener("click", (e) => {
            if (!labelBox.contains(e.target)) {
                dropdownList.classList.add("hidden");
            }
            if (!labelBoxProdi.contains(e.target)) {
                dropdownListProdi.classList.add("hidden");
            }
        });

        // Delete button
        const deleteBtn = choiceItem.querySelector(".delete-choice");
        if (deleteBtn) {
            deleteBtn.addEventListener("click", () => {
                const visibleChoices = document.querySelectorAll(
                    ".choice-item:not(.hidden)"
                );
                if (visibleChoices.length > 1) {
                    // Reset values
                    selectedText.textContent = "";
                    selectedText.classList.add("hidden");
                    selectedProdi.textContent = "";
                    selectedProdi.classList.add("hidden");
                    selectedId = "";

                    // Clear hidden inputs
                    const choiceNumber = choiceItem.dataset.choice;
                    choiceItem.querySelector(
                        `input[name="perguruan_tinggi${choiceNumber}"]`
                    ).value = "";
                    choiceItem.querySelector(
                        `input[name="program_studi${choiceNumber}"]`
                    ).value = "";

                    // Clear prodi dropdown
                    dropdownListProdi.innerHTML = "";

                    // Hide this choice
                    choiceItem.classList.add("hidden");

                    updateChoiceHeadings();
                    updateAddButtonVisibility();
                }
            });
        }
    }

    // Update choice headings
    function updateChoiceHeadings() {
        document
            .querySelectorAll(".choice-item:not(.hidden)")
            .forEach((item, index) => {
                item.querySelector(".choice-heading").textContent = `Pilihan ${
                    index + 1
                }`;
            });
    }

    // Update add button visibility
    function updateAddButtonVisibility() {
        const hiddenChoices = document.querySelectorAll(".choice-item.hidden");
        addChoiceBtn.style.display =
            hiddenChoices.length > 0 ? "inline-flex" : "none";
    }

    // Add choice button
    addChoiceBtn.addEventListener("click", () => {
        const hiddenChoices = document.querySelectorAll(".choice-item.hidden");
        if (hiddenChoices.length > 0) {
            hiddenChoices[0].classList.remove("hidden");
            updateChoiceHeadings();
            updateAddButtonVisibility();
        }
    });

    // AJAX Form submission
    majorForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Basic validation
        const visibleChoices = document.querySelectorAll('.choice-item:not(.hidden)');
        let isValid = true;
        let errorMessage = '';

        visibleChoices.forEach((choice, index) => {
            const ptInput = choice.querySelector(`input[name="perguruan_tinggi${choice.dataset.choice}"]`);
            const prodiInput = choice.querySelector(`input[name="program_studi${choice.dataset.choice}"]`);

            if (!ptInput.value && prodiInput.value) {
                isValid = false;
                errorMessage = `Pilihan ${index + 1}: Harap pilih Perguruan Tinggi terlebih dahulu`;
            } else if (ptInput.value && !prodiInput.value) {
                isValid = false;
                errorMessage = `Pilihan ${index + 1}: Harap pilih Program Studi`;
            }
        });

        if (!isValid) {
            showNotification('error', errorMessage);
            return;
        }

        // Prepare form data
        const formData = new FormData(majorForm);

        // Show loading
        showLoading();

        // Send AJAX request
        fetch(majorForm.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            hideLoading();
            if (data.success) {
                showNotification('success', data.message || 'Pilihan jurusan berhasil disimpan!');
            } else {
                showNotification('error', data.message || 'Terjadi kesalahan saat menyimpan data.');
            }
        })
        .catch(error => {
            hideLoading();
            console.error('Error:', error);
            showNotification('error', 'Terjadi kesalahan jaringan. Silakan coba lagi.');
        });
    });

    // Initialize everything
    initializeChoices();
});

ini js nya

gimana caranya supaya saat milih perguruan tinggi kolom program studi itu direset(disetel kosong)