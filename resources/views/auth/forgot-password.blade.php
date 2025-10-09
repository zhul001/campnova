<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupa Password - Campnova</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: white;
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

        /* Styling untuk bagian kontak */
        .contact-section {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1.5rem;
            gap: 1rem;
        }

        .contact-title {
            font-size: 0.875rem;
            color: #374151;
            margin: 0;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .ds-divider {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 16px 0px;
        }

        .ds-divider__left,
        .ds-divider__right {
            flex: 1;
            height: 1px;
            background-color: #e5e7eb;
        }

        .ds-divider__content {
            padding: 0 12px;
            color: #6b7280;
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center p-4">
    <div class="flex items-center mt-6 mb-4 sm:mt-10">
        <img src="../img/logo campnova.svg" alt="campnova logo" class="w-12 h-12 mr-2">
        <span class="text-xl font-semibold text-gray-800">Campnova</span>
    </div>

    <div class="w-full max-w-sm bg-white rounded-xl p-6 
           sm:border sm:border-gray-200 sm:shadow-lg">
        <p class="text-center text-gray-600 mb-4 text-xs sm:text-sm">
            Masukkan email untuk kirim kode OTP
        </p>

        <form method="POST" action="{{ route('password.sendOtp') }}" class="space-y-4" novalidate>
            @csrf
            <div>
                <label class="sr-only" for="email">Email address</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.97671 3.2998C3.0897 3.2998 1.55998 4.85786 1.55998 6.77981V17.2198C1.55998 19.1418 3.0897 20.6998 4.97671 20.6998H19.0233C20.9103 20.6998 22.44 19.1418 22.44 17.2198V6.7798C22.44 4.85785 20.9103 3.2998 19.0233 3.2998H4.97671ZM4.97671 5.23314C4.13804 5.23314 3.45816 5.92561 3.45816 6.77981V7.18001L12.0001 11.8068L20.5418 7.18021V6.7798C20.5418 5.9256 19.8619 5.23314 19.0233 5.23314H4.97671ZM20.5418 9.50025L12.4962 13.8582C12.3427 13.9434 12.1689 13.9881 11.9927 13.987C11.8501 13.9861 11.7059 13.9552 11.5695 13.8915C11.5467 13.8809 11.5243 13.8695 11.5022 13.8572L3.45816 9.50005V17.2198C3.45816 18.074 4.13804 18.7665 4.97671 18.7665H19.0233C19.8619 18.7665 20.5418 18.074 20.5418 17.2198V9.50025Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <input id="email" name="email" type="email" required autocomplete="email"
                        placeholder="alamat email" value="{{ old('email') }}"
                        class="input-focus block w-full pl-10 pr-3 py-3 rounded-lg placeholder-gray-400 text-sm" />
                </div>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-[#b9e4f4] hover:bg-[#a0d3e9] text-gray-900 font-medium py-3 rounded-lg 
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 text-sm transition-colors">
                Kirim kode
            </button>
        </form>

        <div class="flex justify-between mt-3 text-xs">
            <a href="/login" class="text-blue-600 hover:underline">
                Sudah ingat password?
            </a>
        </div>

        <div class="ds-divider">
            <div class="ds-divider__left"></div>
            <div class="ds-divider__content">OR</div>
            <div class="ds-divider__right"></div>
        </div>

        <div class="contact-section">
            <p class="contact-title">Kontak Kami</p>
            <div class="social-icons">
                <a href="https://wa.me/" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                    <lord-icon src="https://cdn.lordicon.com/dnphlhar.json" trigger="morph" state="morph-circle"
                        colors="primary:#121331,secondary:#000000" style="width: 25px; height: 25px">
                    </lord-icon>
                </a>
                <a href="https://instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <lord-icon src="https://cdn.lordicon.com/tgyvxauj.json" trigger="hover" state="hover-rotate"
                        colors="primary:#121331,secondary:#000000" style="width: 25px; height: 25px">
                    </lord-icon>
                </a>
            </div>
        </div>
    </div>
</body>

</html>