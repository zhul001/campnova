<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <link rel="icon" href="{{ asset('img/logo_campnova_blue_f.png') }}" type="image/png">
  <title>Campnova | Panduan Mail Server</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body class="bg-gray-50 p-6 font-inter">

  <!-- Navbar -->
  <nav class="sticky top-0 z-[100] w-full border-b border-gray-100 bg-white/95 backdrop-blur-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="flex items-center space-x-3">
          <img src="{{ asset('img/logo_campnova_blue.svg') }}" alt="Logo" class="h-8 w-auto">
          <span class="text-xl sm:text-2xl font-bold text-black">Nain</span>
        </div>
        <div class="flex items-center space-x-2">
          <a href="/login" class="border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-100 rounded-md">Masuk</a>
          <a href="/register" class="bg-[#5daac7] hover:bg-[#4b8fae] text-white px-3 py-1.5 text-xs font-medium rounded-md">Daftar</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-sm overflow-hidden mt-8">
    <div class="p-6 border-b border-gray-200">
      <h1 class="text-xl font-semibold text-gray-800">Network Adapter VirtualBox</h1>
      <p class="text-sm text-gray-500 mt-1">Perbandingan fungsi setiap jenis adapter</p>
    </div>

    <!-- Tabel Adapter -->
    <div class="p-4 overflow-x-auto">
      <table class="w-full text-sm text-left min-w-[800px]">
        <thead>
          <tr class="text-gray-700">
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Jenis Adapter</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Akses Internet</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Akses ke Host</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Akses ke VM lain</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Kegunaan</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">NAT</td>
            <td>Ya</td><td>Tidak langsung</td><td>Tidak</td><td>Internet untuk VM tunggal</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">Bridged</td>
            <td>Ya</td><td>Ya</td><td>Ya</td><td>Server nyata di jaringan LAN</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">Host-Only</td>
            <td>Tidak</td><td>Ya</td><td>Ya</td><td>Simulasi jaringan lokal (host–VM)</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">Internal</td>
            <td>Tidak</td><td>Tidak</td><td>Ya</td><td>Jaringan antar VM tertutup</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">NAT Network</td>
            <td>Ya</td><td>Tidak</td><td>Ya</td><td>VM saling akses dan tetap online</td>
          </tr>
        </tbody>
      </table>

      <p class="text-gray-700 mt-4">
        Beberapa Wi-Fi kampus, kantor, atau hotspot publik bisa memblokir alamat MAC virtual.
        Router mengenali VM sebagai perangkat baru dan menolak koneksi internetnya. Gunakan hotspot pribadi untuk uji coba.
      </p>
    </div>

    <!-- Tabel Kelas IP -->
    <div class="p-6 border-t border-gray-200">
      <h1 class="text-xl font-semibold text-gray-800">Kelas IP Address</h1>
      <p class="text-sm text-gray-500 mt-1">Rentang IP, subnet default, dan fungsi utama</p>
    </div>

    <div class="p-4 overflow-x-auto">
      <table class="w-full text-sm text-left min-w-[800px]">
        <thead>
          <tr class="text-gray-700">
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Kelas</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Rentang IP</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Subnet Default</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Fungsi</th>
            <th class="pb-3 border-b-2 border-gray-300 font-semibold">Untuk Host</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">A</td>
            <td>1.0.0.0 – 126.255.255.255</td>
            <td>255.0.0.0 (/8)</td>
            <td>Jaringan besar (pemerintah, ISP)</td>
            <td>Ya</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">B</td>
            <td>128.0.0.0 – 191.255.255.255</td>
            <td>255.255.0.0 (/16)</td>
            <td>Jaringan menengah (kampus, perusahaan)</td>
            <td>Ya</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">C</td>
            <td>192.0.0.0 – 223.255.255.255</td>
            <td>255.255.255.0 (/24)</td>
            <td>Jaringan kecil (rumah, kantor kecil)</td>
            <td>Ya</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">D</td>
            <td>224.0.0.0 – 239.255.255.255</td>
            <td>-</td>
            <td>Multicast (streaming, grup)</td>
            <td>Tidak</td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 font-medium">E</td>
            <td>240.0.0.0 – 255.255.255.255</td>
            <td>-</td>
            <td>Penelitian dan eksperimen</td>
            <td>Tidak</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Panduan Konfigurasi -->
  <div class="max-w-3xl mx-auto mt-12 px-4">
    <h1 class="text-3xl font-bold text-[#5daac7] mb-6 text-center">Panduan Install & Konfigurasi Mail Server</h1>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">1. Atur Network Adapter di VirtualBox</h2>
      <p class="text-gray-700">1. Buka Settings → Network<br>2. Adapter 1: pilih NAT<br>3. Adapter 2: aktifkan Host-Only Adapter → klik Advanced → pada Promiscuous Mode pilih "Allow All"</p>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">2. Konfigurasi Network</h2>
      <div class="terminal">
        <div class="terminal-header"><div class="dots"></div><button class="copy-btn" data-target="1">Copy</button></div>
        <pre>nano /etc/network/interfaces</pre>
      </div>

      <p class="text-gray-700 mt-2">Isi seperti berikut:</p>

      <div class="terminal mt-2">
        <div class="terminal-header"><div class="dots"></div><button class="copy-btn" data-target="2">Copy</button></div>
<pre>allow-hotplug enp0s3
iface enp0s3 inet dhcp

auto enp0s8
iface enp0s8 inet static
    address 192.168.27.28
    netmask 255.255.255.0</pre>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">3. Restart Network</h2>
      <div class="terminal">
        <div class="terminal-header"><div class="dots"></div><button class="copy-btn" data-target="3">Copy</button></div>
        <pre>systemctl restart networking</pre>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">4. Cek IP Address</h2>
      <div class="terminal">
        <div class="terminal-header"><div class="dots"></div><button class="copy-btn" data-target="4">Copy</button></div>
        <pre>ip a</pre>
      </div>
    </section>
  </div>

  <footer class="text-center text-gray-500 text-sm py-8 border-t border-gray-100">
        © 2025 Campnova. Semua hak dilindungi.
    </footer>

  <!-- Script Salin -->
  <script>
    document.querySelectorAll('.copy-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const text = btn.parentElement.nextElementSibling.textContent.trim();
        navigator.clipboard.writeText(text);
        btn.textContent = 'Tersalin!';
        setTimeout(() => btn.textContent = 'Copy', 1500);
      });
    });
  </script>

  <!-- Style Terminal -->
  <style>
    .terminal {
      background: #1e1e1e;
      border: 1px solid #333;
      border-radius: 8px;
      overflow: hidden;
      color: #f1f1f1;
      font-family: monospace;
      font-size: 0.9rem;
    }
    .terminal-header {
      background: #2c2c2c;
      padding: 6px 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #444;
    }
    .dots span, .dots::before, .dots::after {
      content: '';
      display: inline-block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-right: 6px;
    }
    .dots { display: flex; }
    .dots::before { background: #ff5f56; }
    .dots::after { background: #27c93f; }
    .dots span { background: #ffbd2e; }
    .terminal pre {
      margin: 0;
      padding: 12px;
      white-space: pre-wrap;
      background: #1e1e1e;
      color: #e2e8f0;
    }
    .copy-btn {
      background: #22b8cf;
      border: none;
      color: white;
      padding: 3px 10px;
      font-size: 0.75rem;
      border-radius: 5px;
      cursor: pointer;
    }
    .copy-btn:hover { background: #0ca6b0; }
  </style>
</body>
</html>
