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

<body class="bg-gray-950 text-gray-100 font-sans antialiased">
  <div class="max-w-4xl mx-auto px-4 py-10">
    <header class="text-center mb-10">
      <h1 class="text-4xl font-bold text-teal-400 mb-2">Panduan Konfigurasi Debian</h1>
      <p class="text-gray-400">Belajar konfigurasi server Linux langkah demi langkah</p>
    </header>

    <section>
      <h2 class="text-2xl font-semibold text-white mb-4">Daftar Tutorial</h2>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <!-- Mail Server -->
        <a href="{{ url('/mailserver') }}" 
           class="block bg-gray-900 hover:bg-teal-600 hover:text-white transition rounded-2xl p-6 shadow border border-gray-800">
          <div class="text-3xl mb-3">📧</div>
          <h3 class="font-semibold text-lg mb-1">Konfigurasi Mail Server</h3>
          <p class="text-sm text-gray-400">Postfix, Dovecot, dan Telnet</p>
        </a>

        <!-- DNS Server -->
        <a href="{{ url('/dnsserver') }}" 
           class="block bg-gray-900 hover:bg-teal-600 hover:text-white transition rounded-2xl p-6 shadow border border-gray-800">
          <div class="text-3xl mb-3">🌐</div>
          <h3 class="font-semibold text-lg mb-1">Konfigurasi DNS Server</h3>
          <p class="text-sm text-gray-400">BIND9 dan pengujian DNS</p>
        </a>

        <!-- Web Server -->
        <a href="{{ url('/webserver') }}" 
           class="block bg-gray-900 hover:bg-teal-600 hover:text-white transition rounded-2xl p-6 shadow border border-gray-800">
          <div class="text-3xl mb-3">💻</div>
          <h3 class="font-semibold text-lg mb-1">Konfigurasi Web Server</h3>
          <p class="text-sm text-gray-400">Apache2 dan Virtual Host</p>
        </a>

        <!-- FTP Server -->
        <a href="{{ url('/ftpserver') }}" 
           class="block bg-gray-900 hover:bg-teal-600 hover:text-white transition rounded-2xl p-6 shadow border border-gray-800">
          <div class="text-3xl mb-3">📂</div>
          <h3 class="font-semibold text-lg mb-1">Konfigurasi FTP Server</h3>
          <p class="text-sm text-gray-400">vsftpd dan transfer file</p>
        </a>

        <!-- SSH Server -->
        <a href="{{ url('/sshserver') }}" 
           class="block bg-gray-900 hover:bg-teal-600 hover:text-white transition rounded-2xl p-6 shadow border border-gray-800">
          <div class="text-3xl mb-3">🔒</div>
          <h3 class="font-semibold text-lg mb-1">Konfigurasi SSH Server</h3>
          <p class="text-sm text-gray-400">Akses jarak jauh yang aman</p>
        </a>
      </div>
    </section>

    <footer class="text-center text-gray-500 text-sm mt-12">
      © 2025 Campnova. Semua hak dilindungi.
    </footer>
  </div>
</body>
</html>
