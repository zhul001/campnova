<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Subtes;
use App\Models\HasilSubtes;
use App\Models\HasilTryout;
use App\Models\JawabanPeserta;
use App\Models\PilihanJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TryoutController extends Controller
{
    public function index()
{
    $tryouts = Tryout::latest()->get();
    $user = Auth::user();

    // Hitung jumlah peserta per tryout
    $pesertaCounts = HasilTryout::select('tryout_id', DB::raw('COUNT(DISTINCT user_id) as peserta_count'))
        ->groupBy('tryout_id')
        ->pluck('peserta_count', 'tryout_id')
        ->toArray();

    // FRESH QUERY untuk cek pilihan jurusan - hindari cache
    $hasPilihanJurusan = PilihanJurusan::where('user_id', $user->id)
        ->where(function($query) {
            $query->whereNotNull('perguruan_tinggi1')
                  ->orWhereNotNull('perguruan_tinggi2')
                  ->orWhereNotNull('perguruan_tinggi3')
                  ->orWhereNotNull('perguruan_tinggi4');
        })
        ->exists();

    if ($user->is_admin) {
        return view('admin.tryout', compact('tryouts', 'pesertaCounts'));
    } else {
        return view('user.tryout', compact('tryouts', 'hasPilihanJurusan', 'pesertaCounts'));
    }
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_paket' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Set default is_active ke false (terkunci)
        // $validated['is_active'] = false;

        Tryout::create($validated);

        return redirect()->back()->with('success', 'Tryout berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul_paket' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $tryout = Tryout::findOrFail($id);
        $tryout->update($validated);

        return redirect()->back()->with('success', 'Tryout berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tryout = Tryout::findOrFail($id);
        $tryout->delete();

        return redirect()->back()->with('success', 'Tryout berhasil dihapus.');
    }

    // Method untuk mengaktifkan/menonaktifkan tryout
    public function toggleStatus($id)
    {
        $tryout = Tryout::findOrFail($id);
        $tryout->is_active = !$tryout->is_active;
        $tryout->save();

        $status = $tryout->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->back()->with('success', "Tryout berhasil $status.");
    }

    // Menampilkan halaman subtes untuk tryout tertentu
    public function show($id)
    {
        $tryout = Tryout::findOrFail($id);
        $subtes = \App\Models\Subtes::all();
        $user = Auth::user();

        // Hitung jumlah peserta untuk tryout ini
        $pesertaCount = HasilTryout::where('tryout_id', $tryout->id)
                        ->distinct('user_id')
                        ->count('user_id');

        // Prepare an array to hold the count of created questions per subtes
        $createdQuestionCounts = [];
        $subtesStatus = [];

        foreach ($subtes as $item) {
            // Hitung jumlah soal pilihan ganda dan esai
            $pilganCount = \App\Models\Soalpilgan::where('subtes_id', $item->id)
                            ->where('tryout_id', $tryout->id)
                            ->count();
            $esaiCount = \App\Models\Soalesai::where('subtes_id', $item->id)
                            ->where('tryout_id', $tryout->id)
                            ->count();
            $createdQuestionCounts[$item->id] = $pilganCount + $esaiCount;

            // Cek status pengerjaan subtes
            $hasilSubtes = HasilSubtes::where('user_id', $user->id)
                            ->where('tryout_id', $tryout->id)
                            ->where('subtes_id', $item->id)
                            ->first();
            
            $subtesStatus[$item->id] = $hasilSubtes ? 'selesai' : 'menunggu';
        }

        // Cari subtes pertama yang belum dikerjakan
        $currentSubtes = null;
        foreach ($subtes as $item) {
            if ($subtesStatus[$item->id] === 'menunggu') {
                $currentSubtes = $item->id;
                break;
            }
        }

        $allSubtesCompleted = true;
        foreach ($subtes as $item) {
            if ($subtesStatus[$item->id] !== 'selesai') {
                $allSubtesCompleted = false;
                break;
            }
        }

        if (Auth::user()->is_admin) {
            return view('admin.subtes', compact('tryout', 'subtes', 'createdQuestionCounts', 'pesertaCount'));
        } else {
            return view('user.subtes', compact('tryout', 'subtes', 'createdQuestionCounts', 'subtesStatus', 'currentSubtes', 'allSubtesCompleted', 'pesertaCount'));
        }
    }

    public function reset($id)
    {
        $user = Auth::user();
        $tryout = Tryout::findOrFail($id);

        // Hapus data terkait tryout
        try {
            DB::transaction(function () use ($user, $tryout) {
                // Hapus jawaban peserta
                JawabanPeserta::where('user_id', $user->id)
                    ->where('tryout_id', $tryout->id)
                    ->delete();

                // Hapus hasil subtes
                HasilSubtes::where('user_id', $user->id)
                    ->where('tryout_id', $tryout->id)
                    ->delete();

                // Hapus hasil tryout
                HasilTryout::where('user_id', $user->id)
                    ->where('tryout_id', $tryout->id)
                    ->delete();
            });

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}