<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="{{ asset('img/logo_campnova_blue_f.png') }}" type="image/png">

    <title>Campnova | Belajar & Tryout</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
  <body class="text-gray-100 font-sans antialiased">
    <nav class="sticky top-0 z-[100] w-full border-b border-gray-100 bg-white/95 backdrop-blur-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex shrink-0 items-center space-x-2 sm:space-x-3">
                    <div class="flex items-center" href="/">
                        <img class="block h-8 w-auto cursor-pointer" decoding="async" height="35" loading="lazy"
                            src="{{ asset('img/logo_campnova_blue.svg') }}" width="35" />
                    </div>
                    <span class="text-xl sm:text-2xl font-bold text-black select-none sm:font-semibold">
                        Nain
                    </span>
                </div>

                <div class="flex items-center space-x-1 sm:space-x-2">
                    <a class="rounded-md border border-gray-300 px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-100 min-w-[60px] sm:min-w-[70px] text-center"
                        href="/login">
                        Masuk
                    </a>
                    <a class="rounded-md bg-[#5daac7] hover:bg-[#4b8fae] text-white px-2.5 py-1.5 text-xs font-medium focus:outline-none min-w-[60px] sm:min-w-[70px] text-center"
                        href="/register">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto mt-12 px-4">
      <h1 class="text-3xl font-bold text-[#5daac7] mb-6 text-center">
        Panduan konfigurasi repositori
      </h1>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          1. konfigurasi repositori
        </h2>
        <div
          class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900"
        >
          <div
            class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700"
          >
            <div class="flex space-x-2">
              <span class="w-3 h-3 bg-red-500 rounded-full"></span>
              <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
              <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            </div>
            <button
              class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500"
              data-target="0"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">nano /etc/apt/sources.list</pre
            >
          </div>
        </div>
      </section>

      <p class="text-black mb-4">kemudian ganti isi file sesuai versi debian</p>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          Debian 13 - Trixie
        </h2>
        <div
          class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900"
        >
          <div
            class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700"
          >
            <div class="flex space-x-2">
              <span class="w-3 h-3 bg-red-500 rounded-full"></span>
              <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
              <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            </div>
            <button
              class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500"
              data-target="0"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
deb http://deb.debian.org/debian trixie main contrib non-free non-free-firmware
deb http://security.debian.org/debian-security trixie-security main contrib non-free non-free-firmware
deb http://deb.debian.org/debian trixie-updates main contrib non-free non-free-firmware
                </pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          Debian 12 - Bookworm
        </h2>
        <div
          class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900"
        >
          <div
            class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700"
          >
            <div class="flex space-x-2">
              <span class="w-3 h-3 bg-red-500 rounded-full"></span>
              <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
              <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            </div>
            <button
              class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500"
              data-target="0"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
deb http://deb.debian.org/debian bookworm main contrib non-free non-free-firmware
deb http://security.debian.org/debian-security bookworm-security main contrib non-free non-free-firmware
deb http://deb.debian.org/debian bookworm-updates main contrib non-free non-free-firmware
                </pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          Debian 11 - Bullseye
        </h2>
        <div
          class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900"
        >
          <div
            class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700"
          >
            <div class="flex space-x-2">
              <span class="w-3 h-3 bg-red-500 rounded-full"></span>
              <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
              <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            </div>
            <button
              class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500"
              data-target="0"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
deb http://deb.debian.org/debian bullseye main contrib non-free
deb http://security.debian.org/debian-security bullseye-security main contrib non-free
deb http://deb.debian.org/debian bullseye-updates main contrib non-free
                </pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          Debian 10 - Buster
        </h2>
        <div
          class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900"
        >
          <div
            class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700"
          >
            <div class="flex space-x-2">
              <span class="w-3 h-3 bg-red-500 rounded-full"></span>
              <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
              <span class="w-3 h-3 bg-green-500 rounded-full"></span>
            </div>
            <button
              class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500"
              data-target="0"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
deb http://deb.debian.org/debian buster main contrib non-free
deb http://security.debian.org/debian-security buster/updates main contrib non-free
deb http://deb.debian.org/debian buster-updates main contrib non-free    
            </pre
            >
          </div>
        </div>
      </section>
    </div>
  </body>
</html>