<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Soalesai;

class SoalEsaiSeeder extends Seeder
{
    public function run(): void
    {
        // Bacaan yang sama dengan soal pilgan subtes 1
        $bacaan1 = 'Bacaan: "Perkembangan teknologi digital telah membawa perubahan signifikan dalam berbagai sektor. (1) Transformasi ini tidak hanya mempengaruhi bidang ekonomi, tetapi juga pendidikan dan kesehatan. (2) Masyarakat harus beradaptasi dengan kemajuan ini agar tidak tertinggal. (3) Namun, dampak negatif seperti kesenjangan digital perlu diwaspadai. (4) Oleh karena itu, pemerintah menggalakkan program literasi digital secara masif."';

        // Subtes 1 (Penalaran Umum) - Nomor 2 dan 3
        SoalEsai::create([
            'tryout_id' => 1,
            'subtes_id' => 1,
            'nomor_soal' => 2,
            'soal' => $bacaan1 . '\n\nPernyataan:\nA. Teknologi digital hanya bermanfaat untuk sektor ekonomi\nB. Semua masyarakat sudah melek digital tanpa perlu program literasi\nC. Kesenjangan digital terjadi karena kurangnya akses internet di daerah terpencil\n\nJawab dengan format: tht (t=memperkuat, h=memperlemah)',
            'soal_gambar' => null,
            'kunci_jawaban' => 'hht',
        ]);

        SoalEsai::create([
            'tryout_id' => 1,
            'subtes_id' => 1,
            'nomor_soal' => 3,
            'soal' => $bacaan1 . '\n\nPernyataan:\nA. Program literasi digital sudah menjangkau seluruh lapisan masyarakat\nB. Transformasi digital meningkatkan efisiensi di sektor kesehatan\nC. Kemajuan teknologi tidak mempengaruhi kesenjangan sosial\n\nJawab dengan format: tht (t=memperkuat, h=memperlemah)',
            'soal_gambar' => null,
            'kunci_jawaban' => 'hth',
        ]);

        // Bacaan yang sama dengan soal pilgan subtes 2
        $bacaan2 = 'Bacaan: "Perkembangan teknologi digital telah membawa perubahan signifikan dalam berbagai sektor. (1) Transformasi ini tidak hanya mempengaruhi bidang ekonomi, tetapi juga pendidikan dan kesehatan. (2) Masyarakat harus beradaptasi dengan kemajuan ini agar tidak tertinglag. (3) Namun, dampak negatif seperti kesenjangan digital perlu diwaspadai. (4) Oleh karena itu, pemerintah menggalakkan program literasi digital secara masif."';

        // Subtes 2 (Pemahaman Umum) - Nomor 4 dan 5
        SoalEsai::create([
            'tryout_id' => 1,
            'subtes_id' => 2,
            'nomor_soal' => 4,
            'soal' => $bacaan2 . '\n\nKalimat manakah yang mengandung kata tidak baku?',
            'soal_gambar' => null,
            'kunci_jawaban' => '3',
        ]);

        SoalEsai::create([
            'tryout_id' => 1,
            'subtes_id' => 2,
            'nomor_soal' => 5,
            'soal' => $bacaan2 . '\n\nKalimat manakah yang menggunakan konjungsi antitatif?',
            'soal_gambar' => null,
            'kunci_jawaban' => '3',
        ]);
    }
}