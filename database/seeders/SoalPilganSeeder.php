<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Soalpilgan;

class SoalPilganSeeder extends Seeder
{
    public function run(): void
    {
        SoalPilgan::create([
            'tryout_id' => 1,
            'subtes_id' => 1,
            'nomor_soal' => 1,
            'soal' => 'Jika semua A adalah B, dan beberapa B adalah C, maka pernyataan yang pasti benar adalah...',
            'soal_gambar' => null,
            'jawaban_a' => 'Semua A adalah C',
            'jawaban_b' => 'Beberapa A adalah C',
            'jawaban_c' => 'Semua C adalah A',
            'jawaban_d' => 'Beberapa C adalah A',
            'jawaban_e' => 'Tidak dapat disimpulkan',
            'kunci_jawaban' => 'b',
        ]);

        SoalPilgan::create([
            'tryout_id' => 1,
            'subtes_id' => 1,
            'nomor_soal' => 4,
            'soal' => 'Urutan angka: 2, 4, 8, 16, ... Berapakah angka berikutnya?',
            'soal_gambar' => null,
            'jawaban_a' => '24',
            'jawaban_b' => '28',
            'jawaban_c' => '30',
            'jawaban_d' => '32',
            'jawaban_e' => '36',
            'kunci_jawaban' => 'd',
        ]);

        SoalPilgan::create([
            'tryout_id' => 1,
            'subtes_id' => 1,
            'nomor_soal' => 5,
            'soal' => 'Sebuah toko memberikan diskon 20% untuk semua produk. Jika Rina membeli sebuah tas dengan harga Rp 200.00 sebelum diskon, berapa harga tas sesudah diskon',
            'soal_gambar' => null,
            'jawaban_a' => 'Rp 160.000',
            'jawaban_b' => 'Rp 180.000',
            'jawaban_c' => 'Rp 190.000',
            'jawaban_d' => 'Rp 210.000',
            'jawaban_e' => 'Rp 220.000',
            'kunci_jawaban' => 'a',
        ]);

        // Soal untuk subtes Pemahaman Umum (subtes_id = 2) - UTBK SNBT
// Bacaan yang sama digunakan untuk semua soal
$bacaan = 'Bacaan: "Perkembangan teknologi digital telah membawa perubahan signifikan dalam berbagai sektor. (1) Transformasi ini tidak hanya mempengaruhi bidang ekonomi, tetapi juga pendidikan dan kesehatan. (2) Masyarakat harus beradaptasi dengan kemajuan ini agar tidak tertinggal. (3) Namun, dampak negatif seperti kesenjangan digital perlu diwaspadai. (4) Oleh karena itu, pemerintah menggalakkan program literasi digital secara masif."';

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 2,
    'nomor_soal' => 1,
    'soal' => $bacaan . '\n\nKata hubung yang tepat untuk menggantikan kata "Namun" pada kalimat nomor (3) adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'Oleh sebab itu',
    'jawaban_b' => 'Akan tetapi',
    'jawaban_c' => 'Bahkan',
    'jawaban_d' => 'Sedangkan',
    'jawaban_e' => 'Sementara',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 2,
    'nomor_soal' => 2,
    'soal' => $bacaan . '\n\nMakna kata "masif" dalam bacaan tersebut adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'terbatas',
    'jawaban_b' => 'berskala besar',
    'jawaban_c' => 'bertahap',
    'jawaban_d' => 'sementara',
    'jawaban_e' => 'spesifik',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 2,
    'nomor_soal' => 3,
    'soal' => $bacaan . '\n\nUnsur kalimat yang berfungsi sebagai subjek pada kalimat nomor (1) adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'telah membawa',
    'jawaban_b' => 'perubahan signifikan',
    'jawaban_c' => 'dalam berbagai sektor',
    'jawaban_d' => 'Transformasi ini',
    'jawaban_e' => 'tidak hanya mempengaruhi',
    'kunci_jawaban' => 'd',
]);
// Soal untuk subtes Pemahaman Bacaan dan Menulis (subtes_id = 3) - UTBK SNBT
// Bacaan yang sama digunakan untuk semua soal
$bacaan3 = 'Bacaan: "revolusi industri 4.0 telah mengubah paradigma dunia kerja secara fundamental. (1) Keterampilan digital menjadi prasyarat utama dalam memasuki lapangan pekerjaan. (2) Banyak profesi tradisional yang mulai tergantikan oleh automasi dan artificial intelligence; (3) disisi lain, muncul peluang baru dalam bidang teknologi yang membutuhkan keahlian spesifik. (4) Pendidikan vokasi dan pelatihan berkelanjutan menjadi kunci dalam menyiapkan tenaga kerja yang kompetitif."';

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 3,
    'nomor_soal' => 1,
    'soal' => $bacaan3 . '\n\nKesalahan penggunaan huruf kapital terdapat pada...',
    'soal_gambar' => null,
    'jawaban_a' => 'awal bacaan (kata "revolusi")',
    'jawaban_b' => 'kalimat (1) (kata "Keterampilan")',
    'jawaban_c' => 'kalimat (2) (kata "Banyak")',
    'jawaban_d' => 'kalimat (3) (kata "artificial intelligence")',
    'jawaban_e' => 'kalimat (4) (kata "Pendidikan")',
    'kunci_jawaban' => 'a',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 3,
    'nomor_soal' => 2,
    'soal' => $bacaan3 . '\n\nKesalahan tanda baca terdapat pada kalimat...',
    'soal_gambar' => null,
    'jawaban_a' => '(1) karena tidak menggunakan koma',
    'jawaban_b' => '(2) karena tidak menggunakan titik koma',
    'jawaban_c' => '(3) karena menggunakan titik koma yang tidak tepat',
    'jawaban_d' => '(4) karena tidak menggunakan tanda seru',
    'jawaban_e' => 'awal bacaan karena tidak menggunakan titik dua',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 3,
    'nomor_soal' => 3,
    'soal' => $bacaan3 . '\n\nKata baku yang tepat untuk mengganti kata tidak baku dalam bacaan adalah...',
    'soal_gambar' => null,
    'jawaban_a' => '"automasi" seharusnya "otomasi"',
    'jawaban_b' => '"disisi" seharusnya "di sisi"',
    'jawaban_c' => '"vokasi" seharusnya "vokasional"',
    'jawaban_d' => '"spesifik" seharusnya "spesifikasi"',
    'jawaban_e' => '"kompetitif" seharusnya "kompetensi"',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 3,
    'nomor_soal' => 4,
    'soal' => $bacaan3 . '\n\nKonjungsi yang tepat untuk mengganti kata "disisi lain" pada kalimat (3) adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'oleh karena itu',
    'jawaban_b' => 'akan tetapi',
    'jawaban_c' => 'sementara itu',
    'jawaban_d' => 'dengan demikian',
    'jawaban_e' => 'oleh sebab itu',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 3,
    'nomor_soal' => 5,
    'soal' => $bacaan3 . '\n\nPerbaikan yang tidak tepat untuk bacaan tersebut adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'Mengawali bacaan dengan huruf kapital',
    'jawaban_b' => 'Mengganti titik koma dengan koma pada kalimat (3)',
    'jawaban_c' => 'Memisahkan "disisi" menjadi "di sisi"',
    'jawaban_d' => 'Menghapus tanda titik dua setelah "Bacaan"',
    'jawaban_e' => 'Mengganti "automasi" dengan "automatisasi"',
    'kunci_jawaban' => 'd',
]);

// Soal untuk subtes Pengetahuan Kuantitatif (subtes_id = 4) - UTBK SNBT
SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 4,
    'nomor_soal' => 1,
    'soal' => 'Jika x + y = 12 dan x - y = 4, maka nilai dari x² - y² adalah...',
    'soal_gambar' => null,
    'jawaban_a' => '24',
    'jawaban_b' => '36',
    'jawaban_c' => '48',
    'jawaban_d' => '64',
    'jawaban_e' => '96',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 4,
    'nomor_soal' => 2,
    'soal' => 'Sebuah toko memberikan diskon 20% + 15% untuk sebuah produk. Jika harga awal produk Rp 500.000, maka harga yang harus dibayar adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'Rp 300.000',
    'jawaban_b' => 'Rp 320.000',
    'jawaban_c' => 'Rp 340.000',
    'jawaban_d' => 'Rp 360.000',
    'jawaban_e' => 'Rp 380.000',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 4,
    'nomor_soal' => 3,
    'soal' => 'Diketahui barisan aritmatika: 5, 8, 11, 14, ...\nSuku ke-15 dari barisan tersebut adalah...',
    'soal_gambar' => null,
    'jawaban_a' => '42',
    'jawaban_b' => '45',
    'jawaban_c' => '47',
    'jawaban_d' => '50',
    'jawaban_e' => '53',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 4,
    'nomor_soal' => 4,
    'soal' => 'Sebuah segitiga siku-siku memiliki alas 6 cm dan tinggi 8 cm. Panjang sisi miring segitiga tersebut adalah...',
    'soal_gambar' => null,
    'jawaban_a' => '10 cm',
    'jawaban_b' => '12 cm',
    'jawaban_c' => '14 cm',
    'jawaban_d' => '16 cm',
    'jawaban_e' => '18 cm',
    'kunci_jawaban' => 'a',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 4,
    'nomor_soal' => 5,
    'soal' => 'Jika 2ˣ = 32 dan 3ʸ = 81, maka nilai dari x + y adalah...',
    'soal_gambar' => null,
    'jawaban_a' => '7',
    'jawaban_b' => '8',
    'jawaban_c' => '9',
    'jawaban_d' => '10',
    'jawaban_e' => '11',
    'kunci_jawaban' => 'c',
]);

        // Soal untuk subtes Literasi Bahasa Indonesia (subtes_id = 5) - UTBK SNBT
// Bacaan yang sama digunakan untuk semua soal
$bacaan5 = 'Bacaan: "Pandemi COVID-19 telah memberikan dampak signifikan terhadap sektor pendidikan di Indonesia. Pembelajaran daring yang diterapkan sebagai alternatif pembelajaran tatap muka menimbulkan berbagai tantangan. Keterbatasan akses internet dan perangkat teknologi menjadi kendala utama bagi siswa di daerah terpencil. Selain itu, kesenjangan digital antara wilayah perkotaan dan pedesaan semakin terlihat jelas. Meskipun demikian, pandemi juga memicu inovasi dalam metode pembelajaran dan adaptasi teknologi pendidikan yang lebih cepat."';

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 5,
    'nomor_soal' => 1,
    'soal' => $bacaan5 . '\n\nPernyataan yang TIDAK terdapat dalam teks adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'Pembelajaran daring menjadi alternatif selama pandemi',
    'jawaban_b' => 'Keterbatasan akses internet menghambat pembelajaran',
    'jawaban_c' => 'Pandemi memperparah kesenjangan digital',
    'jawaban_d' => 'Pemerintah memberikan bantuan kuota internet gratis',
    'jawaban_e' => 'Pandemi memicu inovasi metode pembelajaran',
    'kunci_jawaban' => 'd',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 5,
    'nomor_soal' => 2,
    'soal' => $bacaan5 . '\n\nInformasi yang TIDAK dijelaskan dalam teks adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'Dampak pandemi terhadap sektor pendidikan',
    'jawaban_b' => 'Jenis perangkat teknologi yang digunakan siswa',
    'jawaban_c' => 'Kesenjangan antara wilayah perkotaan dan pedesaan',
    'jawaban_d' => 'Tantangan pembelajaran daring',
    'jawaban_e' => 'Inovasi dalam metode pembelajaran',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 5,
    'nomor_soal' => 3,
    'soal' => $bacaan5 . '\n\nTeks tersebut terutama membahas tentang...',
    'soal_gambar' => null,
    'jawaban_a' => 'Keunggulan pembelajaran daring di masa pandemi',
    'jawaban_b' => 'Dampak pandemi terhadap pendidikan dan tantangannya',
    'jawaban_c' => 'Kebijakan pemerintah dalam pendidikan daring',
    'jawaban_d' => 'Perbandingan pendidikan kota dan desa',
    'jawaban_e' => 'Teknologi pendidikan yang paling efektif',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 5,
    'nomor_soal' => 4,
    'soal' => $bacaan5 . '\n\nBerdasarkan teks, dampak positif dari pandemi COVID-19 adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'Meningkatnya kesenjangan digital',
    'jawaban_b' => 'Terbatasnya akses internet di daerah terpencil',
    'jawaban_c' => 'Munculnya inovasi metode pembelajaran',
    'jawaban_d' => 'Berkurangnya interaksi sosial antar siswa',
    'jawaban_e' => 'Menurunnya kualitas pendidikan secara umum',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 5,
    'nomor_soal' => 5,
    'soal' => $bacaan5 . '\n\nKelompok yang paling terdampak berdasarkan teks adalah...',
    'soal_gambar' => null,
    'jawaban_a' => 'Guru di perkotaan',
    'jawaban_b' => 'Siswa di daerah terpencil',
    'jawaban_c' => 'Orang tua bekerja',
    'jawaban_d' => 'Pemerintah daerah',
    'jawaban_e' => 'Pengembang teknologi',
    'kunci_jawaban' => 'b',
]);

        // Soal untuk subtes Literasi Bahasa Inggris (subtes_id = 6) - UTBK SNBT
// Dialog yang sama digunakan untuk semua soal
$dialog6 = 'Dialogue:
Sarah: "Hey John, have you heard about the new environmental policy our school is implementing?"
John: "No, I haven\'t. What\'s it about?"
Sarah: "Starting next month, single-use plastics will be completely banned on campus. No more plastic bottles, straws, or food containers."
John: "That\'s quite a drastic change. How are students supposed to bring drinks and food?"
Sarah: "The school will provide water refill stations and encourage everyone to use reusable containers. They\'re also partnering with local cafes to offer discounts for bringing your own cups."
John: "That sounds reasonable, but what about the convenience? Plastic is so much easier."
Sarah: "I know it might be inconvenient at first, but think about the long-term benefits. We\'ll reduce our plastic waste by thousands of bottles each month."
John: "You\'re right. The environmental impact is significant. I guess we all need to adapt for a better future."';

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 6,
    'nomor_soal' => 1,
    'soal' => $dialog6 . '\n\nWhat is the main topic of the conversation?',
    'soal_gambar' => null,
    'jawaban_a' => 'School cafeteria food quality',
    'jawaban_b' => 'New environmental policy banning plastics',
    'jawaban_c' => 'Student discount programs',
    'jawaban_d' => 'Water conservation methods',
    'jawaban_e' => 'Recycling techniques',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 6,
    'nomor_soal' => 2,
    'soal' => $dialog6 . '\n\nWhat is John\'s initial reaction to the new policy?',
    'soal_gambar' => null,
    'jawaban_a' => 'Very enthusiastic',
    'jawaban_b' => 'Completely opposed',
    'jawaban_c' => 'Concerned about convenience',
    'jawaban_d' => 'Confused about the details',
    'jawaban_e' => 'Excited about discounts',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 6,
    'nomor_soal' => 3,
    'soal' => $dialog6 . '\n\nWhat solution does the school provide for drinks?',
    'soal_gambar' => null,
    'jawaban_a' => 'Free plastic bottles',
    'jawaban_b' => 'Water refill stations',
    'jawaban_c' => 'Unlimited free soda',
    'jawaban_d' => 'Paper cups only',
    'jawaban_e' => 'No drinks allowed',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 6,
    'nomor_soal' => 4,
    'soal' => $dialog6 . '\n\nAccording to Sarah, what is the main benefit of this policy?',
    'soal_gambar' => null,
    'jawaban_a' => 'Saving money for students',
    'jawaban_b' => 'Reducing plastic waste significantly',
    'jawaban_c' => 'Increasing cafeteria profits',
    'jawaban_d' => 'Making campus more beautiful',
    'jawaban_e' => 'Attracting more students',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 6,
    'nomor_soal' => 5,
    'soal' => $dialog6 . '\n\nWhat does John finally acknowledge at the end of the conversation?',
    'soal_gambar' => null,
    'jawaban_a' => 'The policy is too strict',
    'jawaban_b' => 'He will transfer to another school',
    'jawaban_c' => 'The environmental impact is important',
    'jawaban_d' => 'The discounts are not enough',
    'jawaban_e' => 'Plastic is still better',
    'kunci_jawaban' => 'c',
]);

        // Soal untuk subtes Penalaran Matematika (subtes_id = 7) - UTBK SNBT
SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 7,
    'nomor_soal' => 1,
    'soal' => 'Sebuah toko memberikan diskon 30% untuk semua produk. Jika Rina membeli sebuah tas dengan harga Rp 350.000 setelah diskon, berapa harga awal tas tersebut?',
    'soal_gambar' => null,
    'jawaban_a' => 'Rp 450.000',
    'jawaban_b' => 'Rp 500.000',
    'jawaban_c' => 'Rp 550.000',
    'jawaban_d' => 'Rp 600.000',
    'jawaban_e' => 'Rp 650.000',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 7,
    'nomor_soal' => 2,
    'soal' => 'Jika 5 pekerja dapat menyelesaikan sebuah proyek dalam 12 hari, berapa hari yang dibutuhkan 8 pekerja untuk menyelesaikan proyek yang sama?',
    'soal_gambar' => null,
    'jawaban_a' => '6,5 hari',
    'jawaban_b' => '7 hari',
    'jawaban_c' => '7,5 hari',
    'jawaban_d' => '8 hari',
    'jawaban_e' => '8,5 hari',
    'kunci_jawaban' => 'c',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 7,
    'nomor_soal' => 3,
    'soal' => 'Diketahui sebuah persegi panjang memiliki panjang (x + 5) cm dan lebar (x - 3) cm. Jika luasnya adalah 84 cm², maka nilai x adalah...',
    'soal_gambar' => null,
    'jawaban_a' => '7',
    'jawaban_b' => '9',
    'jawaban_c' => '11',
    'jawaban_d' => '13',
    'jawaban_e' => '15',
    'kunci_jawaban' => 'b',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 7,
    'nomor_soal' => 4,
    'soal' => 'Sebuah mobil menempuh jarak 180 km dengan kecepatan rata-rata 60 km/jam. Jika mobil tersebut ingin menempuh jarak 270 km dengan waktu yang sama, berapa kecepatan rata-ratanya?',
    'soal_gambar' => null,
    'jawaban_a' => '75 km/jam',
    'jawaban_b' => '80 km/jam',
    'jawaban_c' => '85 km/jam',
    'jawaban_d' => '90 km/jam',
    'jawaban_e' => '95 km/jam',
    'kunci_jawaban' => 'd',
]);

SoalPilgan::create([
    'tryout_id' => 1,
    'subtes_id' => 7,
    'nomor_soal' => 5,
    'soal' => 'Diketahui barisan geometri: 2, 6, 18, 54, ...\nBerapakah jumlah 6 suku pertama dari barisan tersebut?',
    'soal_gambar' => null,
    'jawaban_a' => '486',
    'jawaban_b' => '728',
    'jawaban_c' => '810',
    'jawaban_d' => '972',
    'jawaban_e' => '1.094',
    'kunci_jawaban' => 'b',
]);
    }
}