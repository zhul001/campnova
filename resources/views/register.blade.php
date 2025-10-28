<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Campnova</title>
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
            font-size: 0.75rem;
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

        .date-input-container {
            position: relative;
        }

        .date-input-container input[type="date"] {
            color: #6b7280;
        }

        .date-input-container input[type="date"]:valid {
            color: #111827;
        }

        .date-input-container::after {
            content: "Tanggal Lahir";
            position: absolute;
            left: 2.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
            font-size: 0.875rem;
        }

        .date-input-container input[type="date"]:focus+.date-placeholder,
        .date-input-container input[type="date"]:valid+.date-placeholder {
            display: none;
        }

        input[type="date"]:before {
            content: attr(placeholder);
            color: #9ca3af;
            margin-right: 0.5rem;
        }

        input[type="date"]:focus:before,
        input[type="date"]:valid:before {
            content: "";
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

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            appearance: textfield;
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
    </style>
</head>

<body class="min-h-screen flex flex-col items-center p-4">
    <section class="relative min-h-screen flex flex-col items-center justify-center bg-gray-50 overflow-visible px-4">

  <!-- Animasi kiri -->
  <div class="animation-container animation-left absolute top-1/2 left-2 -translate-y-1/2 z-20 pointer-events-none">
    <lottie-player
      src="/animations/cute-bird.json"
      background="transparent"
      speed="1"
      class="w-20 h-20 sm:w-28 sm:h-28 md:w-32 md:h-32"
      loop
      autoplay>
    </lottie-player>
  </div>

  <!-- Animasi kanan -->
  <div class="animation-container animation-right absolute top-1/2 right-2 -translate-y-1/2 z-20 pointer-events-none">
    <lottie-player
      src="/animations/among-as.json"
      background="transparent"
      speed="1"
      class="w-20 h-20 sm:w-28 sm:h-28 md:w-32 md:h-32"
      loop
      autoplay>
    </lottie-player>
  </div>

  <!-- Logo -->
  <div class="flex items-center mt-6 mb-4 sm:mt-10 relative z-30">
    <img src="{{ asset('img/logo_campnova_blue.svg') }}" alt="campnova logo" class="w-12 h-12 mr-2">
    <span class="text-xl font-semibold text-gray-800">Campnova</span>
  </div>

  <!-- Form register -->
  <div class="w-full max-w-sm bg-white rounded-xl p-6 sm:border sm:border-gray-200 sm:shadow-lg relative z-30">
    <p class="text-center text-gray-600 mb-4 text-xs sm:text-sm">
      Daftar dan Mulai Jelajahi
    </p>

    <form class="space-y-4" action="{{ url('/register') }}" method="POST" novalidate>
      @csrf

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <!-- Short Name -->
        <div>
          <label class="sr-only" for="shortname">Short Name</label>
          <div class="relative rounded-lg shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path
                  d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"
                  stroke="currentColor" stroke-width="2" />
                <path d="M18 18C18 15.7909 16.2091 14 14 14H10C7.79086 14 6 15.7909 6 18V20H18V18Z"
                  stroke="currentColor" stroke-width="2" />
              </svg>
            </div>
            <input id="shortname" name="shortname" type="text" required
              placeholder="Nama Pendek"
              value="{{ old('shortname') }}"
              class="block w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 text-sm focus:ring focus:ring-blue-200" />
          </div>
          @error('shortname')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>

        <!-- Full Name -->
        <div>
          <label class="sr-only" for="fullname">Full Name</label>
          <div class="relative rounded-lg shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path
                  d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"
                  stroke="currentColor" stroke-width="2" />
                <path d="M18 18C18 15.7909 16.2091 14 14 14H10C7.79086 14 6 15.7909 6 18V20H18V18Z"
                  stroke="currentColor" stroke-width="2" />
              </svg>
            </div>
            <input id="fullname" name="fullname" type="text" required
              placeholder="Nama Panjang"
              value="{{ old('fullname') }}"
              class="block w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 text-sm focus:ring focus:ring-blue-200" />
          </div>
          @error('fullname')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Email -->
      <div>
        <label class="sr-only" for="email">Email</label>
        <div class="relative rounded-lg shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M4.97671 3.2998C3.0897 3.2998 1.55998 4.85786 1.55998 6.77981V17.2198C1.55998 19.1418 3.0897 20.6998 4.97671 20.6998H19.0233C20.9103 20.6998 22.44 19.1418 22.44 17.2198V6.7798C22.44 4.85785 20.9103 3.2998 19.0233 3.2998H4.97671Z"
                fill="currentColor"></path>
            </svg>
          </div>
          <input id="email" name="email" type="email" required
            placeholder="Alamat Email"
            value="{{ old('email') }}"
            class="block w-full pl-9 pr-3 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 text-sm focus:ring focus:ring-blue-200" />
        </div>
        @error('email')
        <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div>
        <label class="sr-only" for="password">Password</label>
        <div class="relative rounded-lg shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24">
              <path d="M12.9819 14.7816C12.9819 14.2394 12.5423 13.7998 12.0001 13.7998C11.4578 13.7998 11.0182 14.2394 11.0182 14.7816V17.0289C11.0182 17.5711 11.4578 18.0107 12.0001 18.0107C12.5423 18.0107 12.9819 17.5711 12.9819 17.0289V14.7816Z"
                fill="currentColor"></path>
            </svg>
          </div>
          <input id="password" name="password" type="password" required
            placeholder="Password"
            class="block w-full pl-9 pr-10 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 text-sm focus:ring focus:ring-blue-200" />
        </div>
        @error('password')
        <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <!-- Tanggal Lahir -->
      <div>
        <label class="block text-sm font-medium text-gray-900 mb-1">Tanggal Lahir</label>
        <div class="flex gap-3">
          <input type="number" name="birth_year" id="birth_year" placeholder="Year"
            class="w-1/3 p-3 bg-gray-100 rounded-lg text-center outline-none focus:ring-2 focus:ring-blue-500"
            value="{{ old('birth_year') }}" required />

          <input type="text" name="birth_month" id="birth_month" placeholder="Month"
            class="w-1/3 p-3 bg-gray-100 rounded-lg text-center outline-none focus:ring-2 focus:ring-blue-500"
            value="{{ old('birth_month') }}" required />

          <input type="number" name="birth_day" id="birth_day" placeholder="Day"
            class="w-1/3 p-3 bg-gray-100 rounded-lg text-center outline-none focus:ring-2 focus:ring-blue-500"
            value="{{ old('birth_day') }}" required />
        </div>
      </div>

      <!-- Tombol -->
      <button type="submit"
        class="w-full bg-[#b9e4f4] hover:bg-[#a0d3e9] text-gray-900 font-medium py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 text-sm transition-colors">
        Register
      </button>
    </form>

    <div class="flex justify-center mt-3 text-xs">
      <a href="/login" class="text-blue-600 hover:underline text-center">Masuk</a>
    </div>
  </div>
</section>


    <script>
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", () => {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                togglePassword.textContent = "Show";
            }
        });

        function showDropdown(dropdown, arrow) {
            dropdown.classList.remove('hidden');
            arrow.style.transform = 'rotate(180deg)';
        }

        function hideDropdown(dropdown, arrow) {
            dropdown.classList.add('hidden');
            arrow.style.transform = 'rotate(0deg)';
        }

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
                monthInput.value = item.textContent;
                hideDropdown(monthDropdown, monthArrow);
            });
        });

        const dayButton = document.getElementById('dayButton');
        const dayDropdown = document.getElementById('dayDropdown');
        const dayArrow = document.getElementById('dayArrow');
        const selectedDay = document.getElementById('selectedDay');
        const dayInput = document.getElementById('birth_day');

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
    </script>

</body>

</html>
