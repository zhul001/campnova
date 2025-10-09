<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Subtes;
use App\Models\SoalPilgan;
use App\Models\SoalEsai;
use App\Models\HasilSubtes;
use App\Models\JawabanPeserta;
use App\Models\HasilTryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    public function showExam($tryout_id, $subtes_id)
    {
        $user = Auth::user();
        
        // Validasi urutan pengerjaan subtes
        $allSubtes = Subtes::orderBy('id')->get();
        $currentAllowedSubtes = null;
        
        foreach ($allSubtes as $item) {
            $hasil = HasilSubtes::where('user_id', $user->id)
                      ->where('tryout_id', $tryout_id)
                      ->where('subtes_id', $item->id)
                      ->first();
            
            if (!$hasil) {
                $currentAllowedSubtes = $item->id;
                break;
            }
        }
        
        // Jika mencoba akses subtes yang belum waktunya
        if ($subtes_id != $currentAllowedSubtes) {
            return redirect()->route('tryout.show', $tryout_id)
                   ->with('error', 'Anda harus menyelesaikan subtes sebelumnya terlebih dahulu');
        }
        
        // Lanjutkan ke exam jika valid
        $soalPilgan = SoalPilgan::where('tryout_id', $tryout_id)
                      ->where('subtes_id', $subtes_id)
                      ->orderBy('nomor_soal')
                      ->get();
                      
        $soalEsai = SoalEsai::where('tryout_id', $tryout_id)
                    ->where('subtes_id', $subtes_id)
                    ->orderBy('nomor_soal')
                    ->get();
        
        $subtes = Subtes::findOrFail($subtes_id);
        
        $totalSoal = $soalPilgan->count() + $soalEsai->count(); // Add this line

    return view('user.exam', [
        'tryout_id' => $tryout_id,
        'subtes_id' => $subtes_id,
        'soalPilgan' => $soalPilgan,
        'soalEsai' => $soalEsai,
        'subtes' => Subtes::findOrFail($subtes_id),
        'totalSoal' => $totalSoal, // Pass to view
        'user' => $user
    ]);
    }

    public function submitExam(Request $request, $tryout_id, $subtes_id)
{
    $user = Auth::user();
    $user_id = $user->id;
    
    DB::beginTransaction();
    
    try {
        // Cek apakah subtes sudah pernah disubmit
        $existingSubmission = HasilSubtes::where('user_id', $user_id)
            ->where('tryout_id', $tryout_id)
            ->where('subtes_id', $subtes_id)
            ->lockForUpdate()
            ->first();
            
        if ($existingSubmission) {
            DB::commit();
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah menyelesaikan subtes ini sebelumnya',
                'redirect_url' => route('tryout.show', $tryout_id)
            ], 409);
        }

        // Validasi urutan pengerjaan
        $allSubtes = Subtes::orderBy('id')->get();
        $currentAllowedSubtes = null;
        
        foreach ($allSubtes as $item) {
            $hasil = HasilSubtes::where('user_id', $user_id)
                      ->where('tryout_id', $tryout_id)
                      ->where('subtes_id', $item->id)
                      ->lockForUpdate()
                      ->first();
            
            if (!$hasil) {
                $currentAllowedSubtes = $item->id;
                break;
            }
        }
        
        if ($subtes_id != $currentAllowedSubtes) {
            DB::commit();
            return response()->json([
                'success' => false,
                'message' => 'Anda harus menyelesaikan subtes sebelumnya terlebih dahulu',
                'redirect_url' => route('tryout.show', $tryout_id)
            ], 403);
        }

        // Ambil semua soal untuk validasi
        $soalPilgan = SoalPilgan::where('tryout_id', $tryout_id)
            ->where('subtes_id', $subtes_id)
            ->get()
            ->keyBy('id');

        $soalEsai = SoalEsai::where('tryout_id', $tryout_id)
            ->where('subtes_id', $subtes_id)
            ->get()
            ->keyBy('id');

        $jawabanPilgan = $request->input('jawaban_pilgan', []);
        $jawabanEsai = $request->input('jawaban_esai', []);

        $jumlahBenar = 0;
        $jumlahSoal = $soalPilgan->count() + $soalEsai->count();

        // Batch processing untuk jawaban
        $jawabanPeserta = [];
        $now = now();

        // Proses jawaban pilihan ganda
        foreach ($jawabanPilgan as $soalPilganId => $jawaban) {
            if ($soal = $soalPilgan->get($soalPilganId)) {
                $isBenar = strtoupper($jawaban) === strtoupper($soal->kunci_jawaban);
                if ($isBenar) $jumlahBenar++;

                $jawabanPeserta[] = [
                    'user_id' => $user_id,
                    'tryout_id' => $tryout_id,
                    'subtes_id' => $subtes_id,
                    'soal_pilgan_id' => $soalPilganId,
                    'soal_esai_id' => null,
                    'jawaban' => $jawaban,
                    'is_correct' => $isBenar,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }

        // Proses jawaban esai
        foreach ($jawabanEsai as $soalEsaiId => $jawaban) {
            if ($soal = $soalEsai->get($soalEsaiId)) {
                $isBenar = false;
                if (!empty($soal->kunci_jawaban)) {
                    $isBenar = strtoupper(trim($jawaban)) === strtoupper(trim($soal->kunci_jawaban));
                }
                if ($isBenar) $jumlahBenar++;

                $jawabanPeserta[] = [
                    'user_id' => $user_id,
                    'tryout_id' => $tryout_id,
                    'subtes_id' => $subtes_id,
                    'soal_pilgan_id' => null,
                    'soal_esai_id' => $soalEsaiId,
                    'jawaban' => $jawaban,
                    'is_correct' => $isBenar,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }

        // Insert batch jawaban peserta
        if (!empty($jawabanPeserta)) {
            JawabanPeserta::insert($jawabanPeserta);
        }

        // Hitung statistik
        $jumlahSalah = count($jawabanPilgan) + count($jawabanEsai) - $jumlahBenar;
        $tidakDiisiPilgan = $soalPilgan->count() - count($jawabanPilgan);
        $tidakDiisiEsai = $soalEsai->count() - count($jawabanEsai);
        $totalTidakDiisi = $tidakDiisiPilgan + $tidakDiisiEsai;

        // Hitung skor
        $subtes = Subtes::findOrFail($subtes_id);
        $skorMaksimum = $subtes->skor_maksimum_subtes ?? 100;
        $score = $jumlahSoal > 0 ? ($jumlahBenar / $jumlahSoal) * $skorMaksimum : 0;

        // Simpan hasil subtes
        HasilSubtes::create([
            'user_id' => $user_id,
            'tryout_id' => $tryout_id,
            'subtes_id' => $subtes_id,
            'score' => $score,
            'benar' => $jumlahBenar,
            'salah' => $jumlahSalah,
            'tidak_diisi' => $totalTidakDiisi,
            'jumlah_soal' => $jumlahSoal,
        ]);

        // Update hasil tryout
        HasilTryout::updateOrCreate(
            ['user_id' => $user_id, 'tryout_id' => $tryout_id],
            [
                'total_score' => HasilSubtes::where('user_id', $user_id)
                    ->where('tryout_id', $tryout_id)
                    ->avg('score'),
                'total_benar' => HasilSubtes::where('user_id', $user_id)
                    ->where('tryout_id', $tryout_id)
                    ->sum('benar'),
                'total_salah' => HasilSubtes::where('user_id', $user_id)
                    ->where('tryout_id', $tryout_id)
                    ->sum('salah'),
                'total_tidak_diisi' => HasilSubtes::where('user_id', $user_id)
                    ->where('tryout_id', $tryout_id)
                    ->sum('tidak_diisi'),
            ]
        );

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Jawaban berhasil disimpan dan skor dihitung.',
            'score' => $score,
            'redirect_url' => route('tryout.show', $tryout_id),
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Submit exam error: '.$e->getMessage(), [
            'user_id' => $user_id,
            'tryout_id' => $tryout_id,
            'subtes_id' => $subtes_id,
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menyimpan jawaban. Silakan coba lagi.',
            'error' => env('APP_DEBUG') ? $e->getMessage() : null
        ], 500);
    }
}
}