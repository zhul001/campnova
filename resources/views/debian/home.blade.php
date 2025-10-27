<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Campnova | Panduan Debian</title>
    <link rel="icon" href="{{ asset('img/logo_campnova_blue_f.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-900 antialiased">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 w-full border-b border-gray-100 bg-white/90 backdrop-blur-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center space-x-2">
                    <a href="/" class="flex items-center space-x-2">
                        <img src="{{ asset('img/logo_campnova_blue.svg') }}" alt="Campnova" class="h-8 w-auto">
                        <span class="text-xl font-bold text-black">Nain</span>
                    </a>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="/login"
                        class="rounded-md border border-gray-300 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-100">Masuk</a>
                    <a href="/register"
                        class="rounded-md bg-[#5daac7] hover:bg-[#4b8fae] text-white px-3 py-1.5 text-sm font-medium">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <section class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
        <div class="absolute inset-0 -z-10">
            <svg class="absolute left-0 top-0 h-full w-full opacity-5" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="small-grid" width="20" height="20" patternUnits="userSpaceOnUse">
                        <path d="M 20 0 L 0 0 0 20" fill="none" stroke="currentColor" stroke-width="0.5"></path>
                    </pattern>
                    <pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse">
                        <rect width="100" height="100" fill="url(#small-grid)"></rect>
                        <path d="M 100 0 L 0 0 0 100" fill="none" stroke="currentColor" stroke-width="1"></path>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"></rect>
            </svg>
            <div class="absolute -left-20 -top-20 h-64 w-64 rounded-full bg-[#F2FAFD]"></div>
            <div class="absolute bottom-0 right-0 hidden h-96 w-96 rounded-full bg-[#F2FAFD] md:block"></div>
        </div>

        <div class="relative mx-auto max-w-4xl text-center px-4">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-3">
                Panduan Konfigurasi <span class="text-[#5daac7]">Debian</span>
            </h1>
            <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                Belajar konfigurasi server Linux langkah demi langkah, dari DNS hingga Mail Server.
            </p>
        </div>
    </section>

    <!-- Daftar Tutorial -->
    <main class="relative mx-auto max-w-6xl px-4 pb-20">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Daftar Tutorial</h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ url('/network') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">🖧</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi Network</h3>
                <p class="text-sm text-gray-500">NAT, Bridge, dan Host-Only Adapter</p>
            </a>

            <a href="{{ url('/repository') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">📦</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi Repositori</h3>
                <p class="text-sm text-gray-500">Pengaturan sumber paket Debian</p>
            </a>

            <a href="{{ url('/dns') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">🌐</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi DNS Server</h3>
                <p class="text-sm text-gray-500">BIND9 dan pengujian DNS</p>
            </a>

            <a href="{{ url('/mailserver') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">📧</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi Mail Server</h3>
                <p class="text-sm text-gray-500">Postfix, Dovecot, dan Telnet</p>
            </a>

            <a href="{{ url('/proxyserver') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">🧱</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi Proxy Server</h3>
                <p class="text-sm text-gray-500">Squid dan kontrol akses web</p>
            </a>

            <a href="{{ url('/webserver') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">💻</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi Web Server</h3>
                <p class="text-sm text-gray-500">Apache2 dan Virtual Host</p>
            </a>

            <a href="{{ url('/ftpserver') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">📂</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi FTP Server</h3>
                <p class="text-sm text-gray-500">vsftpd dan transfer file</p>
            </a>

            <a href="{{ url('/sshserver') }}"
                class="block bg-white hover:bg-[#F2FAFD] transition rounded-2xl p-6 shadow-sm border border-gray-200 hover:border-[#5daac7]">
                <div class="text-3xl mb-3">🔒</div>
                <h3 class="font-semibold text-lg text-gray-900 mb-1">Konfigurasi SSH Server</h3>
                <p class="text-sm text-gray-500">Akses jarak jauh yang aman</p>
            </a>
        </div>
    </main>

    <footer class="text-center text-gray-500 text-sm py-8 border-t border-gray-100">
        © 2025 Campnova. Semua hak dilindungi.
    </footer>
</body>

</html>
