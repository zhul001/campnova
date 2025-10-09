document.addEventListener("DOMContentLoaded", function () {
    const prodiData = {
        polije: [
            "D3 - Teknik Komputer",
            "D3 - Manajemen informatika",
            "D4 - Teknik Rekayasa Komputer",
            "D4 - Teknik Informatika",
            "D4 - PSDKU Teknik Informatika Kab.Sidoarjo",
            "D3 - Bahasa Inggris",
            "D4 - Destinasi Pariwisata",
            "D4 - Teknik Mesin Otomotif",
            "D4 - Promosi Kesehatan",
            "D4 - Bisnis Digital",
            "D4 - Gizi Klinik",
            "D4 - Majemen Bisnis Unggas",
            "D3 - Produksi Ternak",
            "D4 - Teknik Produksi Tanaman Pangan",
            "D4 - Manajemen Agroindustri",
            "D4 - Teknik Produksi Benih",
            "D3 - Manajemen Agribisnis",
            "D4 - Teknologi Rekayasa Mekatronika",
            "D4 - Teknik Energi Terbarukan",
            "D4 - Teknologi Industri Pangan",
        ].sort(),
        polinema: [
            "D4 Teknik Informatika",
            "D3 Teknik Elektro",
            "D3 Teknik Sipil",
            "D3 Teknik Mesin",
            "D3 Teknik Listrik",
            "D3 Akuntansi",
            "D3 Manajemen",
            "D4 Teknik Mesin Produksi dan Perawatan",
            "D3 Teknik Kimia",
            "D3 Bahasa Inggris untuk Industri",
            "D4 Teknologi Rekayasa Otomotif",
        ].sort(),
        ppns: [
            "D4 Teknik Perkapalan",
            "D4 Teknik Kelistrikan Kapal",
            "D4 Teknik Permesinan Kapal",
            "D4 Teknik Desain dan Manufaktur Kapal",
            "D4 Teknik Otomasi",
            "D4 Keselamatan dan Kesehatan Kerja",
            "D4 Teknik Sistem Tenaga",
            "D4 Teknik Pengelasan dan Fabrikasi",
            "D4 Rekayasa Sistem Komputer",
        ].sort(),
        ui: [
            "S1 Teknik Informatika",
            "S1 Sistem Informasi",
            "S1 Manajemen",
            "S1 Akuntansi",
            "S1 Psikologi",
            "S1 Hukum",
            "S1 Kedokteran",
            "S1 Arsitektur",
            "S1 Teknik Sipil",
        ].sort(),
        um: [
            "S1 Pendidikan Bahasa Inggris",
            "S1 Pendidikan Matematika",
            "S1 Bimbingan dan Konseling",
            "S1 Psikologi",
            "S1 Manajemen",
            "S1 Akuntansi",
            "S1 Teknik Informatika",
            "S1 Teknologi Pendidikan",
            "S1 Pendidikan Fisika",
        ].sort(),
        unair: [
            "S1 Kedokteran",
            "S1 Farmasi",
            "S1 Hukum",
            "S1 Manajemen",
            "S1 Akuntansi",
            "S1 Psikologi",
            "S1 Teknik Informatika",
            "S1 Ilmu Komunikasi",
            "S1 Keperawatan",
        ].sort(),
        ub: [
            "S1 Kedokteran",
            "S1 Manajemen",
            "S1 Akuntansi",
            "S1 Teknik Informatika",
            "S1 Hukum",
            "S1 Psikologi",
            "S1 Teknik Sipil",
            "S1 Arsitektur",
            "S1 Farmasi",
        ].sort(),
        unesa: [
            "S1 Pendidikan Guru Sekolah Dasar",
            "S1 Manajemen Pendidikan",
            "S1 Teknik Informatika",
            "S1 Akuntansi",
            "S1 Manajemen",
            "S1 Pendidikan Matematika",
            "S1 Pendidikan Bahasa Inggris",
            "S1 Psikologi",
            "S1 Teknik Elektro",
        ].sort(),
        itb: [
            "S1 Teknik Informatika",
            "S1 Teknik Elektro",
            "S1 Teknik Mesin",
            "S1 Arsitektur",
            "S1 Teknik Sipil",
            "S1 Teknik Kimia",
            "S1 Fisika",
            "S1 Matematika",
        ].sort(),
        ugm: [
            "S1 Teknik Informatika",
            "S1 Teknik Elektro",
            "S1 Kedokteran",
            "S1 Hukum",
            "S1 Manajemen",
            "S1 Akuntansi",
            "S1 Psikologi",
            "S1 Arsitektur",
        ].sort(),
        unej: [
            "S1 Kedokteran",
            "S1 Hukum",
            "S1 Teknik Informatika",
            "S1 Manajemen",
            "S1 Akuntansi",
            "S1 Agribisnis",
            "S1 Teknik Sipil",
            "S1 Ilmu Komputer",
            "S1 Psikologi",
        ].sort(),
    };

    const choicesList = document.getElementById("choicesList");
    const addChoiceBtn = document.getElementById("addChoiceBtn");
    const majorForm = document.getElementById("majorForm");
    const submitButton = document.getElementById("submitButton");
    const submitText = document.getElementById("submitText");
    const submitLoading = document.getElementById("submitLoading");
    const notification = document.getElementById("notification");
    const closeNotification = document.getElementById("closeNotification");
    const loadingOverlay = document.getElementById("loadingOverlay");
    const lottieContainer = document.getElementById("lottieContainer");

    function populateProdiDropdown(ptId) {
        dropdownListProdi.innerHTML = "";
        if (!ptId || !prodiData[ptId]) return;

        const sortedProdi = [...prodiData[ptId]].sort((a, b) =>
            a.localeCompare(b, "id", { sensitivity: "base" })
        );

        sortedProdi.forEach((prodi) => {
            const li = document.createElement("li");
            li.className =
                "cursor-pointer select-none py-2 px-3 hover:bg-gray-200";
            li.setAttribute("role", "option");
            li.setAttribute("tabindex", "0");
            li.textContent = prodi;
            li.addEventListener("click", () => selectOptionProdi(li));
            dropdownListProdi.appendChild(li);
        });
    }

    let lottieAnimation = null;

    function initLottieAnimation() {
        if (lottieContainer && lottie) {
            lottieAnimation = lottie.loadAnimation({
                container: lottieContainer,
                renderer: "svg",
                loop: true,
                autoplay: false,
                path: "/animations/sandy-loading.json",
            });
        }
    }

    function showNotification(type, message, title = "Sukses!") {
        notification.className = "fixed top-4 right-4 z-50";
        notification.innerHTML = "";

        let iconColor, iconPath, bgColor;

        switch (type) {
            case "success":
                iconColor = "text-green-500";
                bgColor = "bg-green-50";
                iconPath = `
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            `;
                break;
            case "error":
                iconColor = "text-red-500";
                bgColor = "bg-red-50";
                title = "Error!";
                iconPath = `
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            `;
                break;
            case "warning":
                iconColor = "text-yellow-500";
                bgColor = "bg-yellow-50";
                title = "Peringatan!";
                iconPath = `
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            `;
                break;
        }

        notification.innerHTML = `
                    <div class="bg-white border border-gray-200 px-6 py-4 rounded-lg relative shadow-lg max-w-sm transition-all duration-300 transform translate-x-full" role="alert" id="notificationContent">
                        <div class="flex items-start">
                            <div class="mr-3 mt-0.5 flex-shrink-0 ${iconColor}">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    ${iconPath}
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">${title}</h3>
                                <p class="mt-1 text-sm text-gray-600">${message}</p>
                            </div>
                            <button class="ml-4 flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors" id="closeNotificationBtn">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                `;

        setTimeout(() => {
            const content = document.getElementById("notificationContent");
            content.classList.remove("translate-x-full");
        }, 100);

        const autoHide = setTimeout(() => {
            hideNotification();
        }, 5000);

        document
            .getElementById("closeNotificationBtn")
            .addEventListener("click", () => {
                clearTimeout(autoHide);
                hideNotification();
            });
    }

    function hideNotification() {
        const content = document.getElementById("notificationContent");
        if (content) {
            content.classList.add("translate-x-full");
            setTimeout(() => {
                notification.classList.add("hidden");
            }, 300);
        }
    }

    function showLoading() {
        loadingOverlay.classList.remove("hidden");
        submitText.classList.add("hidden");
        submitLoading.classList.remove("hidden");
        submitButton.disabled = true;

        if (lottieAnimation) {
            lottieAnimation.play();
        }
    }

    function hideLoading() {
        loadingOverlay.classList.add("hidden");
        submitText.classList.remove("hidden");
        submitLoading.classList.add("hidden");
        submitButton.disabled = false;

        if (lottieAnimation) {
            lottieAnimation.stop();
        }
    }

    function initChoiceItem(choiceItem) {
        const labelBox = choiceItem.querySelector(".labelBox");
        const searchInput = choiceItem.querySelector(".searchInput");
        const selectedText = choiceItem.querySelector(".selectedText");
        const inputMirror = choiceItem.querySelector(".inputMirror");
        const dropdownList = choiceItem.querySelector(".dropdownList");
        const allOptions = Array.from(dropdownList.getElementsByTagName("li"));

        const labelBoxProdi = choiceItem.querySelector(".labelBoxProdi");
        const searchInputProdi = choiceItem.querySelector(".searchInputProdi");
        const selectedProdi = choiceItem.querySelector(".selectedProdi");
        const inputMirrorProdi = choiceItem.querySelector(".inputMirrorProdi");
        const dropdownListProdi =
            choiceItem.querySelector(".dropdownListProdi");

        let dropdownVisible = false;
        let selectedValue = "";
        let selectedId = "";

        let dropdownVisibleProdi = false;
        let selectedValueProdi = "";

        const choiceNumber = choiceItem.dataset.choice;
        const ptInput = choiceItem.querySelector(
            `input[name="perguruan_tinggi${choiceNumber}"]`
        );
        const prodiInput = choiceItem.querySelector(
            `input[name="program_studi${choiceNumber}"]`
        );

        if (ptInput.value) {
            selectedValue = ptInput.value;
            selectedText.textContent = selectedValue;
            selectedText.classList.remove("hidden");

            const selectedOption = Array.from(allOptions).find(
                (opt) => opt.textContent === selectedValue
            );
            if (selectedOption) {
                selectedId = selectedOption.getAttribute("data-id");
                populateProdiDropdown(selectedId);
            }
        }

        if (prodiInput.value) {
            selectedValueProdi = prodiInput.value;
            selectedProdi.textContent = selectedValueProdi;
            selectedProdi.classList.remove("hidden");
        }

        function showAllOptions() {
            allOptions.forEach((opt) => (opt.style.display = "block"));
        }

        function filterOptions() {
            const filter = searchInput.value.toLowerCase();
            allOptions.forEach((item) => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(filter) ? "block" : "none";
            });
        }

        function resizeInput() {
            inputMirror.textContent = searchInput.value || "";
            const mirrorWidth = inputMirror.offsetWidth;
            searchInput.style.width = `${mirrorWidth + 10}px`;
        }

        function handleInput() {
            const value = searchInput.value.trim();
            resizeInput();
            filterOptions();

            if (value.length > 0) {
                selectedText.classList.add("hidden");
            } else if (selectedValue !== "") {
                selectedText.textContent = selectedValue;
                selectedText.classList.remove("hidden");
            }
        }

        function selectOption(el) {
            selectedValue = el.textContent;
            selectedId = el.getAttribute("data-id");
            selectedText.textContent = selectedValue;
            selectedText.classList.remove("hidden");
            searchInput.value = "";
            resizeInput();
            dropdownList.classList.add("hidden");
            dropdownVisible = false;

            const choiceNumber = choiceItem.dataset.choice;
            choiceItem.querySelector(
                `input[name="perguruan_tinggi${choiceNumber}"]`
            ).value = selectedValue;

            selectedValueProdi = "";
            selectedProdi.textContent = "";
            selectedProdi.classList.add("hidden");
            searchInputProdi.value = "";
            searchInputProdi.style.width = "1ch";
            dropdownListProdi.classList.add("hidden");
            dropdownVisibleProdi = false;

            choiceItem.querySelector(
                `input[name="program_studi${choiceNumber}"]`
            ).value = "";

            populateProdiDropdown(selectedId);
        }

        function populateProdiDropdown(ptId) {
            dropdownListProdi.innerHTML = "";
            if (!ptId || !prodiData[ptId]) return;

            prodiData[ptId].forEach((prodi) => {
                const li = document.createElement("li");
                li.className =
                    "cursor-pointer select-none py-2 px-3 hover:bg-gray-200";
                li.setAttribute("role", "option");
                li.setAttribute("tabindex", "0");
                li.textContent = prodi;
                li.addEventListener("click", () => selectOptionProdi(li));
                dropdownListProdi.appendChild(li);
            });
        }

        function showAllOptionsProdi() {
            const prodiItems = dropdownListProdi.querySelectorAll("li");
            prodiItems.forEach((opt) => (opt.style.display = "block"));
        }

        function filterOptionsProdi() {
            const filter = searchInputProdi.value.toLowerCase();
            const prodiItems = dropdownListProdi.querySelectorAll("li");
            prodiItems.forEach((item) => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(filter) ? "block" : "none";
            });
        }

        function resizeInputProdi() {
            inputMirrorProdi.textContent = searchInputProdi.value || "";
            const mirrorWidth = inputMirrorProdi.offsetWidth;
            searchInputProdi.style.width = `${mirrorWidth + 10}px`;
        }

        function handleInputProdi() {
            const value = searchInputProdi.value.trim();
            resizeInputProdi();
            filterOptionsProdi();

            if (value.length > 0) {
                selectedProdi.classList.add("hidden");
            } else if (selectedValueProdi !== "") {
                selectedProdi.textContent = selectedValueProdi;
                selectedProdi.classList.remove("hidden");
            }
        }

        function selectOptionProdi(el) {
            selectedValueProdi = el.textContent;
            selectedProdi.textContent = selectedValueProdi;
            selectedProdi.classList.remove("hidden");
            searchInputProdi.value = "";
            resizeInputProdi();
            dropdownListProdi.classList.add("hidden");
            dropdownVisibleProdi = false;

            const choiceNumber = choiceItem.dataset.choice;
            choiceItem.querySelector(
                `input[name="program_studi${choiceNumber}"]`
            ).value = selectedValueProdi;
        }

        function toggleDropdown() {
            dropdownVisible = !dropdownVisible;
            dropdownList.classList.toggle("hidden", !dropdownVisible);
            if (dropdownVisible) {
                searchInput.focus();
                showAllOptions();
                handleInput();
            }
        }

        function toggleDropdownProdi() {
            if (!selectedId) {
                showNotification(
                    "warning",
                    "Pilih Perguruan Tinggi terlebih dahulu"
                );
                return;
            }
            dropdownVisibleProdi = !dropdownVisibleProdi;
            dropdownListProdi.classList.toggle("hidden", !dropdownVisibleProdi);
            if (dropdownVisibleProdi) {
                searchInputProdi.focus();
                showAllOptionsProdi();
                handleInputProdi();
            }
        }

        labelBox.addEventListener("click", toggleDropdown);
        searchInput.addEventListener("input", handleInput);
        allOptions.forEach((li) => {
            li.addEventListener("click", () => selectOption(li));
        });

        labelBoxProdi.addEventListener("click", toggleDropdownProdi);
        searchInputProdi.addEventListener("input", handleInputProdi);

        document.addEventListener("click", (e) => {
            if (
                !labelBox.contains(e.target) &&
                !dropdownList.contains(e.target)
            ) {
                dropdownList.classList.add("hidden");
                dropdownVisible = false;
            }
            if (
                !labelBoxProdi.contains(e.target) &&
                !dropdownListProdi.contains(e.target)
            ) {
                dropdownListProdi.classList.add("hidden");
                dropdownVisibleProdi = false;
            }
        });

        const deleteBtn = choiceItem.querySelector(".delete-choice");
        if (deleteBtn) {
            deleteBtn.addEventListener("click", () => {
                const visibleChoices = document.querySelectorAll(
                    ".choice-item:not(.hidden)"
                );
                if (visibleChoices.length > 1) {
                    selectedText.textContent = "";
                    selectedText.classList.add("hidden");
                    selectedProdi.textContent = "";
                    selectedProdi.classList.add("hidden");
                    selectedId = "";
                    selectedValue = "";
                    selectedValueProdi = "";

                    searchInput.value = "";
                    searchInput.style.width = "1ch";
                    searchInputProdi.value = "";
                    searchInputProdi.style.width = "1ch";

                    const choiceNumber = choiceItem.dataset.choice;
                    choiceItem.querySelector(
                        `input[name="perguruan_tinggi${choiceNumber}"]`
                    ).value = "";
                    choiceItem.querySelector(
                        `input[name="program_studi${choiceNumber}"]`
                    ).value = "";

                    dropdownListProdi.innerHTML = "";

                    choiceItem.classList.add("hidden");

                    updateChoiceHeadings();
                    updateAddButtonVisibility();
                }
            });
        }
    }

    function updateChoiceHeadings() {
        document
            .querySelectorAll(".choice-item:not(.hidden)")
            .forEach((item, index) => {
                item.querySelector(".choice-heading").textContent = `Pilihan ${
                    index + 1
                }`;
            });
    }

    function updateAddButtonVisibility() {
        const hiddenChoices = document.querySelectorAll(".choice-item.hidden");
        addChoiceBtn.style.display =
            hiddenChoices.length > 0 ? "inline-flex" : "none";
    }

    addChoiceBtn.addEventListener("click", () => {
        const hiddenChoices = document.querySelectorAll(".choice-item.hidden");
        if (hiddenChoices.length > 0) {
            hiddenChoices[0].classList.remove("hidden");
            initChoiceItem(hiddenChoices[0]);
            updateChoiceHeadings();
            updateAddButtonVisibility();
        }
    });

    function initializeChoices() {
        const choiceItems = document.querySelectorAll(".choice-item");

        choiceItems.forEach((item) => {
            initChoiceItem(item);
        });

        updateChoiceHeadings();
        updateAddButtonVisibility();
    }

    majorForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const visibleChoices = document.querySelectorAll(
            ".choice-item:not(.hidden)"
        );
        let isValid = true;
        let errorMessage = "";

        visibleChoices.forEach((choice, index) => {
            const ptInput = choice.querySelector(
                `input[name="perguruan_tinggi${choice.dataset.choice}"]`
            );
            const prodiInput = choice.querySelector(
                `input[name="program_studi${choice.dataset.choice}"]`
            );

            if (!ptInput.value && prodiInput.value) {
                isValid = false;
                errorMessage = `Pilihan ${
                    index + 1
                }: Harap pilih Perguruan Tinggi terlebih dahulu`;
            } else if (ptInput.value && !prodiInput.value) {
                isValid = false;
                errorMessage = `Pilihan ${
                    index + 1
                }: Harap pilih Program Studi`;
            }
        });

        if (!isValid) {
            showNotification("error", errorMessage);
            return;
        }

        const formData = new FormData();
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        formData.append("_token", csrfToken);
        formData.append("_method", "PUT");

        visibleChoices.forEach((choice) => {
            const choiceNumber = choice.dataset.choice;
            const ptInput = choice.querySelector(
                `input[name="perguruan_tinggi${choiceNumber}"]`
            );
            const prodiInput = choice.querySelector(
                `input[name="program_studi${choiceNumber}"]`
            );

            if (ptInput.value) {
                formData.append(
                    `perguruan_tinggi${choiceNumber}`,
                    ptInput.value
                );
            }
            if (prodiInput.value) {
                formData.append(
                    `program_studi${choiceNumber}`,
                    prodiInput.value
                );
            }
        });

        showLoading();

        fetch(majorForm.action, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "application/json",
            },
            body: formData,
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                hideLoading();
                if (data.success) {
                    showNotification(
                        "success",
                        data.message || "Pilihan jurusan berhasil disimpan!"
                    );

                    sessionStorage.setItem("comingFromMajor", "true");
                } else {
                    showNotification(
                        "error",
                        data.message || "Terjadi kesalahan saat menyimpan data."
                    );
                }
            })
            .catch((error) => {
                hideLoading();
                console.error("Error:", error);
                showNotification(
                    "error",
                    "Terjadi kesalahan jaringan. Silakan coba lagi."
                );
            });
    });

    if (window.performance && window.performance.navigation.type === 2) {
        sessionStorage.removeItem("comingFromMajor");
    }

    initLottieAnimation();
    initializeChoices();
});
