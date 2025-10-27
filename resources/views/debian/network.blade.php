<!doctype html>
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
<body class="bg-gray-50 p-6">

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

  <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-200">
      <h1 class="text-xl font-semibold text-gray-800">Network Adapter VirtualBox</h1>
      <p class="text-sm text-gray-500 mt-1">Perbandingan fungsi setiap jenis adapter</p>
    </div>

    <div class="p-4 overflow-x-auto">
      <div class="min-w-[800px]">
        <table class="w-full text-sm text-left">
          <thead>
            <tr class="text-gray-700">
              <th class="pb-3 border-b-2 border-gray-300 font-semibold">Jenis Adapter</th>
              <th class="pb-3 border-b-2 border-gray-300 font-semibold">Akses Internet</th>
              <th class="pb-3 border-b-2 border-gray-300 font-semibold">Akses ke Host</th>
              <th class="pb-3 border-b-2 border-gray-300 font-semibold">Akses ke VM lain</th>
              <th class="pb-3 border-b-2 border-gray-300 font-semibold">Kegunaan Umum</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
              <td class="py-3 font-medium">NAT</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Tidak langsung</td>
              <td class="py-3">Tidak</td>
              <td class="py-3">Internet untuk VM tunggal</td>
            </tr>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
              <td class="py-3 font-medium">Bridged</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Server nyata di jaringan (LAN)</td>
            </tr>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
              <td class="py-3 font-medium">Host-Only</td>
              <td class="py-3">Tidak</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Simulasi jaringan lokal (host ↔ VM)</td>
            </tr>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
              <td class="py-3 font-medium">Internal</td>
              <td class="py-3">Tidak</td>
              <td class="py-3">Tidak</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Jaringan antar VM tertutup</td>
            </tr>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
              <td class="py-3 font-medium">NAT Network</td>
              <td class="py-3">Ya</td>
              <td class="py-3">Tidak</td>
              <td class="py-3">Ya</td>
              <td class="py-3">VM saling akses dan tetap online</td>
            </tr>
          </tbody>
        </table>
      </div>

      <p class="text-black mb-4">Beberapa Wi-Fi kampus, kantor, atau hotspot publik memblokir “virtual MAC address”.
Router mengenali VM sebagai perangkat baru dan menolak koneksi internetnya. <br>
jadi kalau mau nyoba pakai hospot saja</p>

      <div class="p-6 border-b border-gray-200">
<h1 class="text-xl font-semibold text-gray-800">Kelas IP Address</h1>
<p class="text-sm text-gray-500 mt-1">Tabel menunjukkan rentang IP, fungsi, dan penggunaan host</p>
</div>


<div class="p-4 overflow-x-auto">
<div class="min-w-[800px]">
<table class="w-full text-sm text-left">
<thead>
<tr class="text-gray-700">
<th class="pb-3 border-b-2 border-gray-300 font-semibold">Kelas</th>
<th class="pb-3 border-b-2 border-gray-300 font-semibold">Rentang IP</th>
<th class="pb-3 border-b-2 border-gray-300 font-semibold">Subnet Default</th>
<th class="pb-3 border-b-2 border-gray-300 font-semibold">Fungsi Utama</th>
<th class="pb-3 border-b-2 border-gray-300 font-semibold">Bisa Dipakai untuk Host?</th>
</tr>
</thead>
<tbody>
<tr class="border-b border-gray-200 hover:bg-gray-50">
<td class="py-3 font-medium">Kelas A</td>
<td class="py-3">1.0.0.0 – 126.255.255.255</td>
<td class="py-3">255.0.0.0 (/8)</td>
<td class="py-3">Jaringan sangat besar (pemerintah, ISP)</td>
<td class="py-3">Ya</td>
</tr>
<tr class="border-b border-gray-200 hover:bg-gray-50">
<td class="py-3 font-medium">Kelas B</td>
<td class="py-3">128.0.0.0 – 191.255.255.255</td>
<td class="py-3">255.255.0.0 (/16)</td>
<td class="py-3">Jaringan menengah (kampus, perusahaan)</td>
<td class="py-3">Ya</td>
</tr>
<tr class="border-b border-gray-200 hover:bg-gray-50">
<td class="py-3 font-medium">Kelas C</td>
<td class="py-3">192.0.0.0 – 223.255.255.255</td>
<td class="py-3">255.255.255.0 (/24)</td>
<td class="py-3">Jaringan kecil (rumah, kantor kecil)</td>
<td class="py-3">Ya</td>
</tr>
<tr class="border-b border-gray-200 hover:bg-gray-50">
<td class="py-3 font-medium">Kelas D</td>
<td class="py-3">224.0.0.0 – 239.255.255.255</td>
<td class="py-3">-</td>
<td class="py-3">Multicast (streaming, komunikasi grup)</td>
<td class="py-3">Tidak</td>
</tr>
<tr class="border-b border-gray-200 hover:bg-gray-50">
<td class="py-3 font-medium">Kelas E</td>
<td class="py-3">240.0.0.0 – 255.255.255.255</td>
<td class="py-3">-</td>
<td class="py-3">Eksperimen dan penelitian</td>
<td class="py-3">Tidak</td>
</tr>
</tbody>
</table>
</div>
</div>
    </div>

    <div class="p-4 text-xs text-gray-500 border-t border-gray-200">
      Tabel menggunakan garis bawah dan tetap lebar di layar kecil, pengguna dapat scroll ke kanan.
    </div>
  </div>

  <div class="max-w-3xl mx-auto mt-12 px-4">

    <section class="mb-8">

        <h1 class="text-3xl font-bold text-[#5daac7] mb-6 text-center">
        Panduan Install & Konfigurasi Mail Server
        </h1>

        <h2 class="text-xl font-semibold mb-2 text-black">
          1. Atur Network Adapter di VirtualBox
        </h2>
        <p class="text-black">1). Buka Settings → Network. <br> 2). adapter 1, pilih nat <br> 3). adapter 2, centang enable network adapter, lalu pilih host only adapter, tekan advanced lalu dibagian promiscuous mode pilih allow all</p>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          2. konfigurasi network
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
            <pre class="whitespace-pre-wrap leading-snug">nano /etc/network/interfaces</pre
            >
          </div>
        </div>
        <pc class="mt-2 mb-2 text-black">Tambahkan atau ubah seperti ini:</pc>
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
allow-hotplug enp0s3
iface enp0s3 inet dhcp

auto enp0s8
iface enp0s8 inet static
    address 192.168.27.28
    netmask 255.255.255.0
                </pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          3. restart network
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
            <pre class="whitespace-pre-wrap leading-snug">systemctl restart networking</pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          4. cek ip
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
            <pre class="whitespace-pre-wrap leading-snug">ip a</pre
            >
          </div>
        </div>
      </section>
  </div>
</body>
</html>