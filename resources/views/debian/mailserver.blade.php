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
        Panduan Install & Konfigurasi Mail Server
      </h1>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          1. update dan upgrade repositori
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
sudo apt update && upgrade -y</pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          2. install mail server
        </h2>
        <p class="text-black mb-2">
          Postfix = kirim dan terima email antar server <br />
          Dovecot IMAP/POP3 = biar user bisa baca email via aplikasi (misalnya
          Thunderbird, Outlook, atau webmail).
        </p>
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
              data-target="1"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
apt install postfix dovecot-imapd dovecot-pop3d -y</pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          3. nanti saat proses penginstalan akann ada pop up seperti ini, buat
          nama mail
        </h2>
        <img src="{{ asset('img/mail server/2. name mail.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          4. muncul ini, tekan tab jika penanda belum di bagian ok, jika sudah
          di bagian ok tekan enter saja
        </h2>
        <img src="{{ asset('img/mail server/2. tab ok.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          5. buat direktori maildir
        </h2>
        <p class="text-black mb-2">
          Maildir adalah format penyimpanan email di sistem UNIX/Linux <br />
          Tujuannya: Supaya setiap kali kamu membuat user baru (misalnya dengan
          adduser), sistem otomatis menyalin isi /etc/skel ke home user
          tersebut. Jadi, folder Maildir akan langsung tersedia di
          /home/namauser/Maildir, tanpa perlu dibuat manual.
        </p>
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
              data-target="2"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
maildirmake.dovecot /etc/skel/Maildir</pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          6. edit file main.cf yang ada di direktori /etc/postfix, dan ganti
          isinya menjadi seperti digambar bawah ini, untuk baris home_mailbox
          itu buat manual
        </h2>
        <div
          class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900 mb-4"
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
              data-target="3"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
nano /etc/postfix/main.cf</pre
            >
          </div>
        </div>
        <img src="../debian/mail server/5. ip dan home.png" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-black font-semibold mb-4">7. konfigurasi ulang postfix, nanti akan muncul pop up tekan
            ok, kemudian ada pop up di bawah ini pilih internet site.</h2>
        <div
          class="mb-4 rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900"
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
              data-target="2"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">
dpkg –configure postfix</pre>
          </div>
        </div>
        <img src="{{ asset('img/mail server/6.0 internet site.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          8. masukkan nama mail yang sudah Anda buat tadi
        </h2>
        <p class="text-black mb-4">Bagian recipient for root dan postmaster mail dikosongkan karena: <br>
Secara default, pesan sistem untuk user root dan postmaster akan dikirim ke alamat lokal di server. <br>
Jika kamu belum punya akun email nyata untuk menerima pesan itu, biarkan kosong supaya postfix tidak mengirim ke alamat yang tidak ada.</p>
        <img src="{{ asset('img/mail server/2. name mail.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          9. bagian ini kosongkan saja
        </h2>
        <img src="{{ asset('img/mail server/6. receipt.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          10. ubah menjadi seperti ini tapi menggunakan nama mail yang sudah dibuat
        </h2>
        <img src="{{ asset('img/mail server/7. blank or none.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          11. dibagian ini pilih no
        </h2>
        <img src="{{ asset('img/mail server/8. no.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          12. karna tadi sudah di setting, jadi biarkan saja ip nya
        </h2>
        <img src="{{ asset('img/mail server/9. biarkan ip.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          13. di bagian ini biarkan 0
        </h2>
        <p class="text-black mb-2">Nilai 0 berarti tanpa batas ukuran email.
Kalau ingin membatasi, ubah nilainya menjadi ukuran maksimum yang diizinkan.
Misalnya untuk membatasi 100 KB maka ganti 0 menjadi 102400</p>
        <img src="{{ asset('img/mail server/9.1. mailbox size limit.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          14. di bagian ini biarkan +
        </h2>
        <p class="text-black mb-4">Tanda + pada Postfix berfungsi sebagai pemisah alias email<br>
Misalnya alamat user+tes@example.com akan tetap dikirim ke user@example.com, tapi bagian +tes bisa digunakan untuk memfilter atau mengelompokkan email masuk</p>
        <img src="{{ asset('img/mail server/9.2. carakter.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          15. pilih ipv4
        </h2>
        <p class="text-black mb-4">karna tadi kita hanya menggunakan ipv4 jadi pilih ipv4 saja, tapi jika anda menggunakan ipv6 dan ipv4 maka pilih all</p>
        <img src="{{ asset('img/mail server/9.2. carakter.png') }}" alt="" />
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          16. edit file 10-auth.conf yang ada di direktori /etc/dovecot/conf.d/, edit file nya seperti dibawah ini (hapus tagar dan ubah dari yes ke no)
        </h2>
        <div
          class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900 mb-4"
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
              data-target="5"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">nano /etc/dovecot/conf.d/10-auth.conf</pre
            >
          </div>
        </div>
        <img src="{{ asset('img/mail server/12. isi nano 10-auth.conf.png') }}" alt="">
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">17. edit file 10-mail.conf yang ada di direktori /etc/dovecot/conf.d, edit file nya seperti dibawah ini (kasih pagar di baris mail_location = mbox, dan hapus pagar di baris mail_location = maildir)</h2>
        <div
          class="mb-4 rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900"
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
              data-target="6"
            >
              Copy
            </button>
          </div>
          <div class="px-4 py-3 font-mono text-sm">
            <pre class="whitespace-pre-wrap leading-snug">nano /etc/dovecot/conf.d/10-mail.conf</pre
            >
          </div>
        </div>
        <img src="{{ asset('img/mail server//13. isi nano 10-mail.png') }}" alt="">
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          18. install telnet untuk mengirim pesan
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
            <pre class="whitespace-pre-wrap leading-snug">apt install telnet -y</pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          19. kirim pesan mail menggunakan telnet
        </h2>
        <p class="mb-4 text-black">untuk mengirim dan menerima pesan harus ada 2 user, jadi kalau belum punya buat menggunakan perintah adduser (nama user) , untuk mengirim gunakan perintah <br>
        telnet (domain atau ip) 25<br>mail from:(user pengirim) <br>rcpt to:(user penerima) <br>data <br>
        (kemudian tulis pesan, jika sudah tekan enter, titik, enter, dan quit untuk keluar)
        </p>
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
root@mail:~# telnet mail.bantal.sch.id 25
Trying fe80::a00:27ff:fe71:6237%enp0s3...
Connection failed: Connection refused
Trying fe80::a00:27ff:fe03:11d0%enp0s8...
Connection failed: Connection refused
Trying 10.0.2.15...
Connected to mail.bantal.sch.id.
Escape character is '^]'.
220 mail.bantal.sch.id ESMTP Postfix (Debian/GNU)
mail from:bantal
250 2.1.0 Ok
rcpt to:terima
250 2.1.5 Ok
data
354 End data with <CR><LF>.<CR><LF>
Selamat Berjuang. Sukses
.
250 2.0.0 Ok: queued as 911A715FD5D
quit
221 2.0.0 Bye
            </pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          20. melihat pesan
        </h2>
        <p class="mb-4 text-black">untuk melihat pesan yang diterima pakai perintah<br>
telnet (domain atau ip) 110 ,<br>
user (nama user) <br>
pass (password user) <br>
list untuk melihat pesan masuk <br>
        </p>
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
telnet mail. bantal. sch.id llø 
Trying fe8ø: 
Connected to mail.bantal. sch.id. 
Escape character is 
+0K Dovecot (Debian) ready. 
user terima 
pass 123 
Logged in. 
list 
+0K 3 messages: 
1 451 
2 425 
3 439
retr 3 
•0K 439 octets 
Return-path: •:bantalebantal . Sch. ids 
X-OriginaI-To; terima 
Delivered-To: terimaebantal id 
Received: from mail (mail 
by mail. bantal.sch.id (Postfix) with SMTP id 911A715FD5D 
for eterima»; Ked, 22 Oct 2025 .e7øø c•ø7) 
essage-ld: .bantal . Sch. ids 
Date: wed, 22 Oct 2025 +07øø (•e7) 
From: bantalebantal . Sch. id 
Selamat Berjuang. Sukses 
            </pre
            >
          </div>
        </div>
      </section>

      <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 text-black">
          21. menghapus pesan mail
        </h2>
        <p class="mb-4 text-black">gunakan perintah dele (nomor pesan)
        </p>
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
dele 1
+0K Marked to be deleted. 
list 
•OK 2 messages: 
2 451 
3 425 
            </pre
            >
          </div>
        </div>
      </section>
    </div>

    <script>
      const buttons = document.querySelectorAll(".copy-btn");
      const codeBlocks = document.querySelectorAll("pre");
      buttons.forEach((btn, i) => {
        btn.addEventListener("click", () => {
          const code = codeBlocks[i].innerText;
          navigator.clipboard.writeText(code);
          btn.innerText = "Copied!";
          setTimeout(() => (btn.innerText = "Copy"), 1500);
        });
      });
    </script>
  </body>
</html>
