<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Daftar - Campnova</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
        
        /* Animation positioning */
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
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .animation-left, .animation-right {
                width: 180px;
                height: 180px;
            }
        }
        
        @media (max-width: 480px) {
            .animation-left, .animation-right {
                width: 180px;
                height: 180px;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center p-4">
    <div class="animation-container animation-left">
        <lottie-player 
            src="/animations/cute-bird.json" 
            background="transparent" 
            speed="1" 
            loop 
            autoplay>
        </lottie-player>
    </div>
    
    <div class="animation-container animation-right">
        <lottie-player 
            src="/animations/among-as.json" 
            background="transparent" 
            speed="1" 
            loop 
            autoplay>
        </lottie-player>
    </div>

    <div class="flex items-center mt-6 mb-4 sm:mt-10">
        <img src="../img/logo campnova.svg" alt="campnova logo" class="w-12 h-12 mr-2">
        <span class="text-xl font-semibold text-gray-800">Campnova</span>
    </div>

    <div class="w-full max-w-sm bg-white rounded-xl p-6 
           sm:border sm:border-gray-200 sm:shadow-lg relative z-10">
        <p class="text-center text-gray-600 mb-4 text-xs sm:text-sm">
            Daftar dan Mulai Jelajahi
        </p>

        <form class="space-y-4" action="{{ url('/register') }}" method="POST" novalidate>
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="sr-only" for="shortname">Short Name</label>
                    <div class="relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M18 18C18 15.7909 16.2091 14 14 14H10C7.79086 14 6 15.7909 6 18V20H18V18Z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <input id="shortname" name="shortname" type="text" required autocomplete="given-name"
                            placeholder="Nama Pendek" value="{{ old('shortname') }}"
                            class="input-focus block w-full pl-9 pr-3 py-2.5 rounded-lg placeholder-gray-400 text-sm" />
                    </div>
                    @error('shortname')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="sr-only" for="fullname">Full Name</label>
                    <div class="relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M18 18C18 15.7909 16.2091 14 14 14H10C7.79086 14 6 15.7909 6 18V20H18V18Z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <input id="fullname" name="fullname" type="text" required autocomplete="family-name"
                            placeholder="Nama Panjang" value="{{ old('fullname') }}"
                            class="input-focus block w-full pl-9 pr-3 py-2.5 rounded-lg placeholder-gray-400 text-sm" />
                    </div>
                    @error('fullname')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="sr-only" for="email">Alamat email</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.97671 3.2998C3.0897 3.2998 1.55998 4.85786 1.55998 6.77981V17.2198C1.55998 19.1418 3.0897 20.6998 4.97671 20.6998H19.0233C20.9103 20.6998 22.44 19.1418 22.44 17.2198V6.7798C22.44 4.85785 20.9103 3.2998 19.0233 3.2998H4.97671ZM4.97671 5.23314C4.13804 5.23314 3.45816 5.92561 3.45816 6.77981V7.18001L12.0001 11.8068L20.5418 7.18021V6.7798C20.5418 5.9256 19.8619 5.23314 19.0233 5.23314H4.97671ZM20.5418 9.50025L12.4962 13.8582C12.3427 13.9434 12.1689 13.9881 11.9927 13.987C11.8501 13.9861 11.7059 13.9552 11.5695 13.8915C11.5467 13.8809 11.5243 13.8695 11.5022 13.8572L3.45816 9.50005V17.2198C3.45816 18.074 4.13804 18.7665 4.97671 18.7665H19.0233C19.8619 18.7665 20.5418 18.074 20.5418 17.2198V9.50025Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <input id="email" name="email" type="email" required autocomplete="email"
                        placeholder="Email address" value="{{ old('email') }}"
                        class="input-focus block w-full pl-9 pr-3 py-2.5 rounded-lg placeholder-gray-400 text-sm" />
                </div>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="sr-only" for="password">Password</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12.9819 14.7816C12.9819 14.2394 12.5423 13.7998 12.0001 13.7998C11.4578 13.7998 11.0182 14.2394 11.0182 14.7816V17.0289C11.0182 17.5711 11.4578 18.0107 12.0001 18.0107C12.5423 18.0107 12.9819 17.5711 12.9819 17.0289V14.7816Z"
                                fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.00012 6.51953V9.52051H6.42405C4.54628 9.52051 3.02405 11.0427 3.02405 12.9205V19.1205C3.02405 20.9983 4.54628 22.5205 6.42405 22.5205H17.576C19.4538 22.5205 20.976 20.9983 20.976 19.1205V12.9205C20.976 11.0427 19.4538 9.52051 17.576 9.52051H17.0001V6.51953C17.0001 3.75811 14.7615 1.51953 12.0001 1.51953C9.2387 1.51953 7.00012 3.75811 7.00012 6.51953ZM12.0001 3.51953C10.3433 3.51953 9.00012 4.86268 9.00012 6.51953V9.52051H15.0001V6.51953C15.0001 4.86268 13.657 3.51953 12.0001 3.51953ZM17.576 11.5205H6.42405C5.65085 11.5205 5.02405 12.1473 5.02405 12.9205V19.1205C5.02405 19.8937 5.65085 20.5205 6.42405 20.5205H17.576C18.3492 20.5205 18.976 19.8937 18.976 19.1205V12.9205C18.976 12.1473 18.3492 11.5205 17.576 11.5205Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        placeholder="Password"
                        class="input-focus block w-full pl-9 pr-10 py-2.5 rounded-lg placeholder-gray-400 text-sm" />
                    <button type="button" id="togglePassword" aria-label="Show password"
                        class="password-toggle absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.853566 11.0498C3.9301 6.63986 7.93993 4.2998 11.9841 4.2998C16.7263 4.2998 20.7897 7.38605 23.178 11.0747L23.1793 11.0767C23.3565 11.3522 23.4509 11.673 23.4509 12.0005C23.4509 12.3273 23.3571 12.6472 23.1806 12.9222C20.7935 16.6596 16.7554 19.6998 11.9841 19.6998C7.16233 19.6998 3.20136 16.6654 0.820516 12.9394C0.639165 12.6577 0.545108 12.3286 0.550199 11.9935C0.555305 11.6575 0.660199 11.3301 0.851082 11.0534L0.853566 11.0498ZM2.49107 12.0246C4.64797 15.3395 8.05011 17.8002 11.9841 17.8002C15.8763 17.8002 19.3535 15.3248 21.5137 12.0017C19.3439 8.71129 15.8389 6.2002 11.9841 6.2002C8.75169 6.2002 5.30085 8.05427 2.49107 12.0246ZM7.8 11.9998C7.8 9.68021 9.68041 7.7998 12 7.7998C14.3196 7.7998 16.2 9.68021 16.2 11.9998C16.2 14.3194 14.3196 16.1998 12 16.1998C9.68041 16.1998 7.8 14.3194 7.8 11.9998ZM12 9.5332C10.6377 9.5332 9.53334 10.6376 9.53334 11.9999C9.53334 13.3622 10.6377 14.4665 12 14.4665C13.3623 14.4665 14.4667 13.3622 14.4667 11.9999C14.4667 10.6376 13.3623 9.5332 12 9.5332Z"
                                fill="currentColor"></path>
                        </svg>
                        <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" class="hidden">
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
                <label class="sr-only" for="birthdate">Date of Birth</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M16 2V6" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 2V6" stroke="currentColor" stroke-width="2"/>
                            <path d="M3 10H21" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 14H16" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <input id="birthdate" name="birthdate" type="date" required autocomplete="bday"
                        placeholder="Tanggal Lahir" value="{{ old('birthdate') }}"
                        class="input-focus block w-full pl-9 pr-3 py-2.5 rounded-lg placeholder-gray-400 text-sm" />
                </div>
                @error('birthdate')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-[#b9e4f4] hover:bg-[#a0d3e9] text-gray-900 font-medium py-2.5 rounded-lg 
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 text-sm transition-colors">
                Register
            </button>
        </form>

        <div class="flex justify-between mt-3 text-xs">
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                Lupa password?
            </a>
            <a href="/login" class="text-blue-600 hover:underline">
                Masuk
            </a>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');
            const toggleButton = document.getElementById('togglePassword');

            // Toggle password visibility
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
                toggleButton.setAttribute('aria-label', 'Hide password');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
                toggleButton.setAttribute('aria-label', 'Show password');
            }
        });
    </script>
</body>
</html>