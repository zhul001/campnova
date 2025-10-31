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

    <div class="max-w-3xl mx-auto mt-12 px-4">
      <h1 class="text-3xl font-bold text-[#5daac7] mb-6 text-center">
        Instalasi FTP Server (vsftpd)
      </h1>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">1. Update dan Upgrade</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="0">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">apt update && upgrade</pre>
        </div>
      </div>
    </section>
    </div>

    <footer class="text-center text-gray-500 text-sm py-8 border-t border-gray-100">
        © 2025 Campnova. Semua hak dilindungi.
    </footer>

    <script>
    const buttons = document.querySelectorAll('.copy-btn');
    const codeBlocks = document.querySelectorAll('pre');
    buttons.forEach((btn, i) => {
      btn.addEventListener('click', () => {
        const code = codeBlocks[i].innerText;
        navigator.clipboard.writeText(code);
        btn.innerText = 'Copied!';
        setTimeout(() => btn.innerText = 'Copy', 1500);
      });
    });
  </script>
</body>

</html>
