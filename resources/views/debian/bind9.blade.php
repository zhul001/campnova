<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Install & Konfigurasi BIND9</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
        Panduan Install & Konfigurasi BIND9
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
          <pre class="whitespace-pre-wrap leading-snug">sudo apt update
sudo apt upgrade -y</pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">2. Install BIND9</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="1">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">sudo apt install -y bind9</pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">3. Buat File Zone</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="4">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">nano db.campnova
$TTL    604800
@       IN      SOA     campnova.com. root.campnova.com. (
                        2          ; Serial
                        604800     ; Refresh
                        86400      ; Retry
                        2419200    ; Expire
                        604800 )   ; Negative Cache TTL

@       IN      NS      campnova.com.
@       IN      A       192.168.100.27</pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">5. Cek & Restart BIND9</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="5">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">$TTL    604800
@       IN      SOA     campnova.com. root.campnova.com. (
                        2          ; Serial
                        604800     ; Refresh
                        86400      ; Retry
                        2419200    ; Expire
                        604800 )   ; Negative Cache TTL

@       IN      NS      campnova.com.
27      IN      PTR     campnova.com.
@       IN      PTR     campnova.com.
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">6. Tambahkan Zone Lokal</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="3">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">nano /etc/bind/named.conf.local
# edit file nya seperti ini
zone "campnova.com" {
    type master;
    file "/etc/bind/db.campnova";
};

zone "100.168.192.in-addr.arpa" {
    type master;
    file "/etc/bind/db.ip";
};</pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">7. Konfigurasi named.conf.options</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="2">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">nano /etc/bind/named.conf.options
#scroll ke bawah sampai nemu listen-on-v6, tambahkan baris ini diatasnya
listen-on { any; };
listen-on-v6 { any; };
;</pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">8. cek konfigurasi dan restart</h2>
      <p class="text-black mb-2">Gunakan perintah named-checkconf untuk memeriksa apakah ada kesalahan konfigurasi. Jika tidak ada error, jalankan perintah restart.</p>
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
          <pre class="whitespace-pre-wrap leading-snug">named-checkconf
systemctl restart bind9
          </pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">9. konfigurasi resolv.conf</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="6">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">nano /etc/resolv.conf
#isi resolv.conf
namesserver 192.168.100.27 #tambahkan ini jika belum ada atau jika sudah ada ganti menjadi ip debian
nameserver 10.20.30.1 #ini biasanya otomatis ada jadi biarin dah gak penting
namesserver 192.168.0.1 #ini biasanya otomatis ada jadi biarin dah gak penting
          </pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">10. cek hasil konfigurasi menggunakan domain</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="1">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">nslookup campnova.com
# jika berhasil muncul
Server:     192.168.100.27
Address:    192.168.100.27#53

Name:   campnova.com
Address:    192.168.27
          </pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">11. cek hasil konfigurasi menggunakan ip</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="1">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">nslookup 192.168.100.27
# jika berhasil muncul
27.100.168.192.in-addr.arpa     name = campnova.com
          </pre>
        </div>
      </div>
    </section>

    <section class="mb-8">
      <h2 class="text-xl font-semibold mb-2 text-black">12. cek hasil konfigurasi di pc client (windows laptop)</h2>
      <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
        <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
          <div class="flex space-x-2">
            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
          </div>
          <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="1">Copy</button>
        </div>
        <div class="px-4 py-3 font-mono text-sm">
          <pre class="whitespace-pre-wrap leading-snug">ping 192.168.100.27
# jika muncul ttl berarti berhasil
nslookup 192.168.100.27
nslookup campnova.com
          </pre>
        </div>
      </div>
    </section>

  </div>

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
