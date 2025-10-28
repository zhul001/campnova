<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - Campnova</title>
    <link rel="icon" href="{{ asset('img/logo_campnova_blue_f.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: white;
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #4b5563;
        }

        .hidden {
            display: none;
        }

        .input-focus {
            transition: all 0.2s ease;
            border: 1px solid #d1d5db;
        }

        .input-focus:focus {
            outline: none;
            border: 1px solid #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.15);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .animation-container {
            position: fixed;
            z-index: -1;
            pointer-events: none;
        }

        .animation-left {
            bottom: 0;
            left: 0;
            width: 300px;
            height: 300px;
        }

        .animation-right {
            bottom: 0;
            right: 0;
            width: 300px;
            height: 300px;
        }

        @media (max-width: 768px) {
            .animation-left,
            .animation-right {
                width: 180px;
                height: 180px;
            }
        }

        @media (max-width: 480px) {
            .animation-left,
            .animation-right {
                width: 180px;
                height: 180px;
            }
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .dropdown-item {
            padding: 8px 10px;
            margin: 3px 6px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
        }

        .year-error {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: none;
        }

        .input-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.15) !important;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center p-4">
    <!-- Animasi kiri -->
    <div class="animation-container animation-left">
        <lottie-player src="/animations/cute-bird.json" background="transparent" speed="1" loop autoplay>
        </lottie-player>
    </div>

    <!-- Animasi kanan -->
    <div class="animation-container animation-right">
        <lottie-player src="/animations/among-as.json" background="transparent" speed="1" loop autoplay>
        </lottie-player>
    </div>

    <!-- Logo -->
    <div class="flex items-center mt-6 mb-4 sm:mt-10">
        <img src="{{ asset('img/logo_campnova_blue.svg') }}" alt="campnova logo" class="w-12 h-12 mr-2">
        <span class="text-xl font-semibold text-gray-800">Campnova</span>
    </div>

    <!-- Form -->
    <div class="w-full max-w-sm bg-white rounded-xl p-6 sm:border sm:border-gray-200 sm:shadow-lg relative z-10">
        <p class="text-center text-gray-600 mb-4 text-xs sm:text-sm">
            Daftar dan Mulai Jelajahi
        </p>

        <form class="space-y-4" action="{{ url('/register') }}" method="POST" novalidate id="registerForm">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="sr-only" for="shortname">Short Name</label>
                    <div class="relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M18 18C18 15.7909 16.2091 14 14 14H10C7.79086 14 6 15.7909 6 18V20H18V18Z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <input id="shortname" name="shortname" type="text" required autocomplete="given-name" 
                               placeholder="Nama Pendek" value="{{ old('shortname') }}" 
                               class="input-focus block w-full pl-10 pr-3 py-3 rounded-lg placeholder-gray-400 text-sm" />
                    </div>
                    @error('shortname')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="sr-only" for="fullname">Full Name</label>
                    <div class="relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M18 18C18 15.7909 16.2091 14 14 14H10C7.79086 14 6 15.7909 6 18V20H18V18Z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <input id="fullname" name="fullname" type="text" required autocomplete="family-name" 
                               placeholder="Nama Panjang" value="{{ old('fullname') }}" 
                               class="input-focus block w-full pl-10 pr-3 py-3 rounded-lg placeholder-gray-400 text-sm" />
                    </div>
                    @error('fullname')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="sr-only" for="email">Alamat Email</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.97671 3.2998C3.0897 3.2998 1.55998 4.85786 1.55998 6.77981V17.2198C1.55998 19.1418 3.0897 20.6998 4.97671 20.6998H19.0233C20.9103 20.6998 22.44 19.1418 22.44 17.2198V6.7798C22.44 4.85785 20.9103 3.2998 19.0233 3.2998H4.97671ZM4.97671 5.23314C4.13804 5.23314 3.45816 5.92561 3.45816 6.77981V7.18001L12.0001 11.8068L20.5418 7.18021V6.7798C20.5418 5.9256 19.8619 5.23314 19.0233 5.23314H4.97671Z"
                                fill="currentColor"/>
                        </svg>
                    </div>
                    <input id="email" name="email" type="email" required autocomplete="email" 
                           placeholder="Alamat Email" value="{{ old('email') }}" 
                           class="input-focus block w-full pl-10 pr-3 py-3 rounded-lg placeholder-gray-400 text-sm" />
                </div>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="sr-only" for="password">Password</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12.9819 14.7816C12.9819 14.2394 12.5423 13.7998 12.0001 13.7998C11.4578 13.7998 11.0182 14.2394 11.0182 14.7816V17.0289C11.0182 17.5711 11.4578 18.0107 12.0001 18.0107C12.5423 18.0107 12.9819 17.5711 12.9819 17.0289V14.7816Z"
                                fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.00012 6.51953V9.52051H6.42405C4.54628 9.52051 3.02405 11.0427 3.02405 12.9205V19.1205C3.02405 20.9983 4.54628 22.5205 6.42405 22.5205H17.576C19.4538 22.5205 20.976 20.9983 20.976 19.1205V12.9205C20.976 11.0427 19.4538 9.52051 17.576 9.52051H17.0001V6.51953C17.0001 3.75811 14.7615 1.51953 12.0001 1.51953C9.2387 1.51953 7.00012 3.75811 7.00012 6.51953ZM12.0001 3.51953C10.3433 3.51953 9.00012 4.86268 9.00012 6.51953V9.52051H15.0001V6.51953C15.0001 4.86268 13.657 3.51953 12.0001 3.51953Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <input id="password" name="password" type="password" required autocomplete="current-password" 
                           placeholder="Password" 
                           class="input-focus block w-full pl-10 pr-10 py-3 rounded-lg placeholder-gray-400 text-sm" />
                    <button type="button" id="togglePassword" aria-label="Show password"
                        class="password-toggle absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.853566 11.0498C3.9301 6.63986 7.93993 4.2998 11.9841 4.2998C16.7263 4.2998 20.7897 7.38605 23.178 11.0747L23.1793 11.0767C23.3565 11.3522 23.4509 11.673 23.4509 12.0005C23.4509 12.3273 23.3571 12.6472 23.1806 12.9222C20.7935 16.6596 16.7554 19.6998 11.9841 19.6998C7.16233 19.6998 3.20136 16.6654 0.820516 12.9394C0.639165 12.6577 0.545108 12.3286 0.550199 11.9935C0.555305 11.6575 0.660199 11.3301 0.851082 11.0534L0.853566 11.0498ZM2.49107 12.0246C4.64797 15.3395 8.05011 17.8002 11.9841 17.8002C15.8763 17.8002 19.3535 15.3248 21.5137 12.0017C19.3439 8.71129 15.8389 6.2002 11.9841 6.2002C8.75169 6.2002 5.30085 8.05427 2.49107 12.0246ZM7.8 11.9998C7.8 9.68021 9.68041 7.7998 12 7.7998C14.3196 7.7998 16.2 9.68021 16.2 11.9998C16.2 14.3194 14.3196 16.1998 12 16.1998C9.68041 16.1998 7.8 14.3194 7.8 11.9998ZM12 9.5332C10.6377 9.5332 9.53334 10.6376 9.53334 11.9999C9.53334 13.3622 10.6377 14.4665 12 14.4665C13.3623 14.4665 14.4667 13.3622 14.4667 11.9999C14.4667 10.6376 13.3623 9.5332 12 9.5332Z"
                                fill="currentColor"></path>
                        </svg>
                        <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" class="hidden">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.80769 2.80754C2.41717 3.19807 2.41717 3.83123 2.80769 4.22176L19.7783 21.1923C20.1688 21.5828 20.8019 21.5828 21.1925 21.1923C21.583 20.8018 21.583 20.1686 21.1925 19.7781L4.22191 2.80754C3.83138 2.41702 3.19822 2.41702 2.80769 2.80754ZM0.853566 11.0499C1.81667 9.66931 2.87124 8.49162 3.9897 7.52506L5.33664 8.87201C4.34176 9.71473 3.38404 10.7628 2.49107 12.0246C4.64797 15.3395 8.05011 17.8002 11.9841 17.8002C12.6828 17.8002 13.3682 17.7204 14.0349 17.5703L15.5771 19.1125C14.4412 19.4899 13.238 19.6998 11.9841 19.6998C7.16233 19.6998 3.20136 16.6654 0.820516 12.9394C0.639165 12.6577 0.545108 12.3286 0.550199 11.9935C0.555305 11.6575 0.660199 11.3301 0.851082 11.0534L0.853566 11.0499ZM7.8 11.9998C7.8 11.7895 7.81547 11.5827 7.84532 11.3807L12.6191 16.1545C12.4171 16.1843 12.2103 16.1998 12 16.1998C9.68041 16.1998 7.8 14.3194 7.8 11.9998ZM11.3808 7.84513L16.1547 12.619C16.1845 12.4169 16.2 12.2102 16.2 11.9998C16.2 9.68021 14.3196 7.7998 12 7.7998C11.7896 7.7998 11.5829 7.81527 11.3808 7.84513ZM21.5137 12.0017C20.7374 13.196 19.7909 14.2808 18.7162 15.1805L20.0631 16.5274C21.2822 15.4826 22.335 14.2461 23.1806 12.9222C23.3571 12.6472 23.4509 12.3273 23.4509 12.0005C23.4509 11.673 23.3565 11.3522 23.1793 11.0767L23.178 11.0747C20.7897 7.38605 16.7263 4.2998 11.9841 4.2998C10.7917 4.2998 9.60227 4.50324 8.43887 4.90318L9.97269 6.43699C10.6474 6.27837 11.3204 6.2002 11.9841 6.2002C15.8389 6.2002 19.3439 8.71129 21.5137 12.0017Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-1">Tanggal lahir</label>
                <div class="flex gap-3">
                    <div class="w-1/3">
                        <input type="number" name="birth_year" id="birth_year" placeholder="Year"
                            class="w-full p-3 bg-gray-100 rounded-lg text-center outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('birth_year') }}" required min="1900" max="2024" />
                        <p id="yearError" class="year-error">Tahun tidak valid</p>
                    </div>
                    <div class="relative w-1/3">
                        <button id="monthButton" type="button"
                            class="w-full p-3 bg-gray-100 rounded-lg flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span id="selectedMonth">{{ old('birth_month') ? old('birth_month') : 'Month' }}</span>
                            <svg id="monthArrow" xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="monthDropdown"
                            class="absolute hidden top-full mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-lg max-h-56 overflow-y-auto no-scrollbar z-10">
                            <div class="dropdown-item" data-value="January">January</div>
                            <div class="dropdown-item" data-value="February">February</div>
                            <div class="dropdown-item" data-value="March">March</div>
                            <div class="dropdown-item" data-value="April">April</div>
                            <div class="dropdown-item" data-value="May">May</div>
                            <div class="dropdown-item" data-value="June">June</div>
                            <div class="dropdown-item" data-value="July">July</div>
                            <div class="dropdown-item" data-value="August">August</div>
                            <div class="dropdown-item" data-value="September">September</div>
                            <div class="dropdown-item" data-value="October">October</div>
                            <div class="dropdown-item" data-value="November">November</div>
                            <div class="dropdown-item" data-value="December">December</div>
                        </div>
                        <input type="hidden" name="birth_month" id="birth_month"
                            value="{{ old('birth_month') }}">
                    </div>
                    <div class="relative w-1/3">
                        <button id="dayButton" type="button"
                            class="w-full p-3 bg-gray-100 rounded-lg flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span id="selectedDay">{{ old('birth_day') ? old('birth_day') : 'Day' }}</span>
                            <svg id="dayArrow" xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="dayDropdown"
                            class="absolute hidden top-full mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-lg max-h-56 overflow-y-auto no-scrollbar z-10 text-left">
                        </div>
                        <input type="hidden" name="birth_day" id="birth_day" value="{{ old('birth_day') }}">
                    </div>
                </div>
                @error('birthdate')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-[#b9e4f4] hover:bg-[#a0d3e9] text-gray-900 font-medium py-3 rounded-lg 
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 text-sm transition-colors">
                Register
            </button>
        </form>

        <div class="flex justify-center mt-3 text-xs">
            <a href="/login" class="text-blue-600 hover:underline text-center">
                Masuk
            </a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");
        const eyeSlashIcon = document.getElementById("eyeSlashIcon");

        togglePassword.addEventListener("click", () => {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
                togglePassword.setAttribute('aria-label', 'Hide password');
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
                togglePassword.setAttribute('aria-label', 'Show password');
            }
        });

        // Dropdown functionality
        function showDropdown(dropdown, arrow) {
            dropdown.classList.remove('hidden');
            arrow.style.transform = 'rotate(180deg)';
        }

        function hideDropdown(dropdown, arrow) {
            dropdown.classList.add('hidden');
            arrow.style.transform = 'rotate(0deg)';
        }

        // Month dropdown
        const monthButton = document.getElementById('monthButton');
        const monthDropdown = document.getElementById('monthDropdown');
        const monthArrow = document.getElementById('monthArrow');
        const selectedMonth = document.getElementById('selectedMonth');
        const monthInput = document.getElementById('birth_month');

        monthButton.addEventListener('click', () => {
            monthDropdown.classList.contains('hidden') ?
                showDropdown(monthDropdown, monthArrow) :
                hideDropdown(monthDropdown, monthArrow);
        });

        monthDropdown.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', () => {
                selectedMonth.textContent = item.textContent;
                monthInput.value = item.getAttribute('data-value');
                hideDropdown(monthDropdown, monthArrow);
            });
        });

        // Day dropdown
        const dayButton = document.getElementById('dayButton');
        const dayDropdown = document.getElementById('dayDropdown');
        const dayArrow = document.getElementById('dayArrow');
        const selectedDay = document.getElementById('selectedDay');
        const dayInput = document.getElementById('birth_day');

        // Populate day dropdown
        for (let i = 1; i <= 31; i++) {
            const div = document.createElement('div');
            div.textContent = i;
            div.className = 'dropdown-item text-left';
            div.addEventListener('click', () => {
                selectedDay.textContent = i;
                dayInput.value = i;
                hideDropdown(dayDropdown, dayArrow);
            });
            dayDropdown.appendChild(div);
        }

        dayButton.addEventListener('click', () => {
            dayDropdown.classList.contains('hidden') ?
                showDropdown(dayDropdown, dayArrow) :
                hideDropdown(dayDropdown, dayArrow);
        });

        // Year validation
        const birthYearInput = document.getElementById('birth_year');
        const yearError = document.getElementById('yearError');
        const registerForm = document.getElementById('registerForm');

        // Track if user has finished typing
        let typingTimer;
        const doneTypingInterval = 1000; // 1 second

        birthYearInput.addEventListener('input', function() {
            clearTimeout(typingTimer);
            // Hide error while typing
            yearError.style.display = 'none';
            birthYearInput.classList.remove('input-error');
            
            // Set timer to validate after user stops typing
            typingTimer = setTimeout(validateYear, doneTypingInterval);
        });

        birthYearInput.addEventListener('blur', function() {
            // Validate immediately when user leaves the field
            clearTimeout(typingTimer);
            validateYear();
        });

        function validateYear() {
            const year = parseInt(birthYearInput.value);
            const currentYear = new Date().getFullYear();
            
            if (isNaN(year) || year < 1900 || year > currentYear) {
                birthYearInput.classList.add('input-error');
                yearError.style.display = 'block';
                birthYearInput.value = ''; // Clear the input if invalid
                return false;
            } else {
                birthYearInput.classList.remove('input-error');
                yearError.style.display = 'none';
                return true;
            }
        }

        // Form validation
        registerForm.addEventListener('submit', function(e) {
            if (!validateYear()) {
                e.preventDefault();
                yearError.style.display = 'block';
                birthYearInput.focus();
            }
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!monthButton.contains(e.target) && !monthDropdown.contains(e.target)) {
                hideDropdown(monthDropdown, monthArrow);
            }
            
            if (!dayButton.contains(e.target) && !dayDropdown.contains(e.target)) {
                hideDropdown(dayDropdown, dayArrow);
            }
        });
    </script>
</body>

</html>