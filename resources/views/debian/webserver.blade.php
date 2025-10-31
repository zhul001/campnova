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

    <section class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">
        <div class="relative mx-auto max-w-4xl text-center px-4">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-3">
                Konfigurasi <span class="text-[#5daac7]">Web Server</span>
            </h1>
            <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                Panduan lengkap instalasi Apache2, MySQL, PHP, dan phpMyAdmin di Debian 12.
            </p>
        </div>
    </section>

    <main class="max-w-4xl mx-auto px-4 pb-20">
        <div class="space-y-10">

            <!-- Apache -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">1. Install Apache2</h2>
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
sudo apt install apache2 -y
sudo systemctl status apache2</pre>
                    </div>
                </div>
                <p class="text-gray-600 mt-3">Cek di browser: <span class="font-mono text-gray-800">http://localhost/</span>
                    untuk memastikan Apache aktif.</p>
            </section>

            <!-- MySQL -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">2. Install MySQL Server (Manual .tar)</h2>
                <p class="text-gray-600 mb-3">
                    Unduh paket MySQL dari situs resmi:
                    <a href="https://dev.mysql.com/downloads/mysql/" target="_blank"
                        class="text-[#5daac7] underline">dev.mysql.com</a>
                </p>
                <p class="text-gray-600 mb-3">
                    Setelah file berhasil diunduh melalui browser, biasanya tersimpan di direktori
                    <span class="font-mono bg-gray-100 px-1 rounded">Downloads</span>.
                    Buka terminal, masuk ke direktori tersebut dan ekstrak file dengan perintah berikut:
                </p>
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
                        <pre class="whitespace-pre-wrap leading-snug">cd /home/nama_user/Downloads
tar -xf mysql-8.4.0-linux-glibc2.28-x86_64.tar.xz</pre>
                    </div>
                </div>
            </section>

            <!-- UTF8 Library -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">3. Install Library UTF-8 (libaio)</h2>
                <p class="text-gray-600 mb-3">
                    Sebelum instalasi MySQL, pastikan library dependensi berikut sudah terpasang:
                </p>
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
                        <pre class="whitespace-pre-wrap leading-snug">apt install mecab-ipadic-utf8 libaio-dev -y</pre>
                    </div>
                </div>
            </section>

            <!-- Install MySQL Packages -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">4. Instalasi Paket MySQL</h2>
                <p class="text-gray-600 mb-3">
                    Setelah dependensi selesai, lanjutkan instalasi MySQL dari paket .deb hasil ekstraksi:
                </p>
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
                        <pre class="whitespace-pre-wrap leading-snug">dpkg -i *.deb</pre>
                    </div>
                </div>
            </section>

            <!-- PHP -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">5. Install PHP dan Modul Apache</h2>
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
                        <pre class="whitespace-pre-wrap leading-snug">apt install php libapache2-mod-php php-mysql -y
php -v #opsional untuk mengecek versi php</pre>
                    </div>
                </div>
            </section>

            <!-- phpMyAdmin -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">6. Install phpMyAdmin</h2>
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
                        <pre class="whitespace-pre-wrap leading-snug">apt install phpmyadmin -y</pre>
                    </div>
                </div>
                <p class="text-gray-600 mt-3">Saat pop-up konfigurasi muncul:</p>
                <ul class="list-disc pl-5 text-gray-600 space-y-1">
                    <li>Pilih <span class="font-semibold">apache2</span> sebagai web server (tekan spasi di bagian
                        apache nanti akan muncul bintang penanda kalau apache dipilih)</li>
                    <li>Pilih <span class="font-semibold">Yes</span> untuk konfigurasi database</li>
                    <li>Masukkan password MySQL root</li>
                    <li>Buat password untuk phpMyAdmin</li>
                    <li>konfirmasi password phpMyAdmin</li>
                </ul>
                <p class="text-gray-600 mt-3">Setelah selesai, restart Apache:
                    <span class="font-mono text-gray-800">sudo systemctl restart apache2</span>
                </p>
                <p class="text-gray-600">Akses di browser:
                    <span class="font-mono text-gray-800">http://localhost/phpmyadmin</span>
                </p>
            </section>

            <!-- Membuat Database Sekolah -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">7. Membuat Database Sekolah</h2>
                <p class="text-gray-600 mb-3">
                    Setelah MySQL terinstal dan berjalan, buka terminal lalu masuk ke MySQL dengan perintah:
                </p>
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
                        <pre class="whitespace-pre-wrap leading-snug">mysql -u root -p</pre>
                    </div>
                </div>
                <p class="text-gray-600 mb-3">
                    Setelah masuk ke shell MySQL, jalankan perintah berikut satu per satu untuk membuat database dan tabel:
                </p>
                <p class="text-gray-600 mb-3">ctrl + d untuk keluar dari mode mysql</p>
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="7">Copy</button>
                    </div>
                    <div class="px-4 py-3 font-mono text-sm">
                        <pre class="whitespace-pre-wrap leading-snug">CREATE DATABASE sekolah;
USE sekolah;

CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    jurusan VARCHAR(100),
    prodi VARCHAR(100),
    gol VARCHAR(10)
);</pre>
                    </div>
                </div>
            </section>

            <!-- Direktori Web -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">8. Membuat Direktori Web Sekolah</h2>
                <p class="text-gray-600 mb-3">
                    Sekarang buat direktori website di <span class="font-mono bg-gray-100 px-1 rounded">/var/www/html</span>
                    dan file utama <span class="font-mono bg-gray-100 px-1 rounded">index.php</span>.
                </p>
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="8">Copy</button>
                    </div>
                    <div class="px-4 py-3 font-mono text-sm">
                        <pre class="whitespace-pre-wrap leading-snug">mkdir /var/www/html/sekolah
chown -R www-data:www-data /var/www/html/sekolah
chmod -R 755 /var/www/html/sekolah
cd /var/www/html/sekolah
nano index.php</pre>
                    </div>
                </div>
                <p class="text-gray-600 mt-3">
                    Perintah di atas:
                </p>
                <ul class="list-disc pl-5 text-gray-600 mb-3">
                    <li><span class="font-mono text-sm">chown</span> memberi hak kepemilikan folder ke pengguna Apache
                        (<span class="font-mono text-sm">www-data</span>).</li>
                    <li><span class="font-mono text-sm">chmod</span> memberi izin baca dan eksekusi agar folder bisa diakses
                        di browser.</li>
                </ul>
            </section>

            <!-- File index.php -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">9. Isi File index.php</h2>
                <p class="text-gray-600 mb-3">
                    Salin kode berikut ke dalam file <span class="font-mono bg-gray-100 px-1 rounded">index.php</span>. Kode
                    ini digunakan untuk menampilkan form input data siswa dan menampilkan hasilnya dari database. Setelah
                    menyalin kode, ubah bagian koneksi sesuai username dan password MySQL kamu.
                </p>
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="9">Copy</button>
                    </div>
                    <div class="px-4 py-3 font-mono text-sm">
                        <pre class="whitespace-pre-wrap leading-snug overflow-x-auto">&lt;?php
$koneksi = new mysqli("localhost", "root", "root", "sekolah");

if ($koneksi-&gt;connect_error) {
    die("Koneksi gagal: " . $koneksi-&gt;connect_error);
}

// Tambah data
if ($_SERVER["REQUEST_METHOD"] == "POST" &amp;&amp; isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $prodi = $_POST["prodi"];
    $gol = $_POST["gol"];
    $sql = "INSERT INTO siswa (nama, jurusan, prodi, gol) VALUES ('$nama', '$jurusan', '$prodi', '$gol')";
    $koneksi-&gt;query($sql);
    header("Location: index.php");
    exit;
}

// Hapus data
if (isset($_GET["hapus"])) {
    $id = $_GET["hapus"];
    $koneksi-&gt;query("DELETE FROM siswa WHERE id=$id");
    header("Location: index.php");
    exit;
}

// Edit data
if ($_SERVER["REQUEST_METHOD"] == "POST" &amp;&amp; isset($_POST["update"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $prodi = $_POST["prodi"];
    $gol = $_POST["gol"];
    $koneksi-&gt;query("UPDATE siswa SET nama='$nama', jurusan='$jurusan', prodi='$prodi', gol='$gol' WHERE id=$id");
    header("Location: index.php");
    exit;
}

// Ambil data untuk edit
$editData = null;
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $editData = $koneksi-&gt;query("SELECT * FROM siswa WHERE id=$id")-&gt;fetch_assoc();
}
?&gt;

&lt;!DOCTYPE html&gt;
&lt;html lang="id"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Data Siswa Sekolah&lt;/title&gt;
    &lt;script src="https://cdn.tailwindcss.com"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body class="bg-gray-100 flex flex-col items-center py-10"&gt;

    &lt;div class="bg-white p-6 rounded-2xl shadow-lg w-full max-w-md border border-gray-200"&gt;
        &lt;h2 class="text-2xl font-semibold text-center text-gray-800 mb-4"&gt;
            &lt;?php echo $editData ? "Edit Data Siswa" : "Tambah Data Siswa"; ?&gt;
        &lt;/h2&gt;

        &lt;form method="POST" class="space-y-3"&gt;
            &lt;?php if ($editData): ?&gt;
                &lt;input type="hidden" name="id" value="&lt;?php echo $editData['id']; ?&gt;"&gt;
            &lt;?php endif; ?&gt;

            &lt;input type="text" name="nama" placeholder="Nama" required class="w-full border rounded-lg p-2"
                value="&lt;?php echo $editData['nama'] ?? ''; ?&gt;"&gt;
            &lt;input type="text" name="jurusan" placeholder="Jurusan" required class="w-full border rounded-lg p-2"
                value="&lt;?php echo $editData['jurusan'] ?? ''; ?&gt;"&gt;
            &lt;input type="text" name="prodi" placeholder="Prodi" required class="w-full border rounded-lg p-2"
                value="&lt;?php echo $editData['prodi'] ?? ''; ?&gt;"&gt;
            &lt;input type="text" name="gol" placeholder="Golongan" required class="w-full border rounded-lg p-2"
                value="&lt;?php echo $editData['gol'] ?? ''; ?&gt;"&gt;

            &lt;?php if ($editData): ?&gt;
                &lt;button type="submit" name="update" class="w-full bg-yellow-500 text-white rounded-lg py-2 hover:bg-yellow-600"&gt;
                    Update Data
                &lt;/button&gt;
                &lt;a href="index.php" class="block text-center mt-2 text-sm text-gray-500 hover:text-gray-700"&gt;Batal&lt;/a&gt;
            &lt;?php else: ?&gt;
                &lt;button type="submit" name="tambah" class="w-full bg-[#5daac7] text-white rounded-lg py-2 hover:bg-[#4b9ab3]"&gt;
                    Simpan Data
                &lt;/button&gt;
            &lt;?php endif; ?&gt;
        &lt;/form&gt;
    &lt;/div&gt;

    &lt;div class="bg-white mt-8 p-6 rounded-2xl shadow-lg w-full max-w-3xl border border-gray-200"&gt;
        &lt;h2 class="text-xl font-semibold mb-4 text-gray-800"&gt;Daftar Siswa&lt;/h2&gt;
        &lt;table class="w-full border-collapse"&gt;
            &lt;thead&gt;
                &lt;tr class="bg-[#f2fafd]"&gt;
                    &lt;th class="border-b p-2 text-left"&gt;Nama&lt;/th&gt;
                    &lt;th class="border-b p-2 text-left"&gt;Jurusan&lt;/th&gt;
                    &lt;th class="border-b p-2 text-left"&gt;Prodi&lt;/th&gt;
                    &lt;th class="border-b p-2 text-left"&gt;Gol&lt;/th&gt;
                    &lt;th class="border-b p-2 text-center"&gt;Aksi&lt;/th&gt;
                &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
                &lt;?php
                $result = $koneksi-&gt;query("SELECT * FROM siswa ORDER BY id DESC");
                while ($row = $result-&gt;fetch_assoc()) {
                    echo "&lt;tr class='hover:bg-gray-50'&gt;
                            &lt;td class='border-b p-2'&gt;{$row['nama']}&lt;/td&gt;
                            &lt;td class='border-b p-2'&gt;{$row['jurusan']}&lt;/td&gt;
                            &lt;td class='border-b p-2'&gt;{$row['prodi']}&lt;/td&gt;
                            &lt;td class='border-b p-2'&gt;{$row['gol']}&lt;/td&gt;
                            &lt;td class='border-b p-2 text-center'&gt;
                                &lt;a href='?edit={$row['id']}' class='text-blue-500 hover:underline mx-1'&gt;Edit&lt;/a&gt; |
                                &lt;a href='?hapus={$row['id']}' class='text-red-500 hover:underline mx-1' onclick='return confirm(\"Hapus data ini?\")'&gt;Hapus&lt;/a&gt;
                            &lt;/td&gt;
                          &lt;/tr&gt;";
                }
                ?&gt;
            &lt;/tbody&gt;
        &lt;/table&gt;
    &lt;/div&gt;

&lt;/body&gt;
&lt;/html&gt;</pre>
                    </div>
                </div>
            </section>

            <!-- Tampilkan Error PHP -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-2 text-black">10. Tampilkan Error PHP</h2>
                <p class="text-gray-600 mb-3">
                    Secara default, Apache menyembunyikan error-nya. Aktifkan supaya tahu penyebabnya:
                </p>
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="10">Copy</button>
                    </div>
                    <div class="px-4 py-3 font-mono text-sm">
                        <pre class="whitespace-pre-wrap leading-snug">nano /etc/php/*/apache2/php.ini</pre>
                    </div>
                </div>
                <p class="text-gray-600 mt-3">Cari baris:</p>
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="11">Copy</button>
                    </div>
                    <div class="px-4 py-3 font-mono text-sm">
                        <pre class="whitespace-pre-wrap leading-snug">display_errors = Off</pre>
                    </div>
                </div>
                <p class="text-gray-600 mt-3">Ubah jadi:</p>
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="12">Copy</button>
                    </div>
                    <div class="px-4 py-3 font-mono text-sm">
                        <pre class="whitespace-pre-wrap leading-snug">display_errors = On</pre>
                    </div>
                </div>
                <p class="text-gray-600 mt-3">Lalu restart Apache:</p>
                <div class="rounded-lg overflow-hidden shadow-lg border border-gray-800 bg-gray-900">
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-800 border-b border-gray-700">
                        <div class="flex space-x-2">
                            <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                            <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <button class="copy-btn text-xs px-3 py-1 rounded bg-teal-600 hover:bg-teal-500" data-target="13">Copy</button>
                    </div>
                    <div class="px-4 py-3 font-mono text-sm">
                        <pre class="whitespace-pre-wrap leading-snug">systemctl restart apache2</pre>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <footer class="text-center text-gray-500 text-sm py-8 border-t border-gray-100">
        © 2025 Campnova. Semua hak dilindungi.
    </footer>

    <script>
        // Fungsi untuk copy teks
        document.addEventListener('DOMContentLoaded', function() {
            const copyButtons = document.querySelectorAll('.copy-btn');
            
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.querySelectorAll('.font-mono pre')[targetId];
                    const textToCopy = targetElement.textContent;
                    
                    navigator.clipboard.writeText(textToCopy).then(() => {
                        // Ubah teks tombol sementara
                        const originalText = this.textContent;
                        this.textContent = 'Copied!';
                        this.classList.remove('bg-teal-600');
                        this.classList.add('bg-green-600');
                        
                        setTimeout(() => {
                            this.textContent = originalText;
                            this.classList.remove('bg-green-600');
                            this.classList.add('bg-teal-600');
                        }, 2000);
                    }).catch(err => {
                        console.error('Gagal menyalin teks: ', err);
                    });
                });
            });
        });
    </script>
</body>

</html>