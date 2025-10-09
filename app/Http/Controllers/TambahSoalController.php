<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soalpilgan;
use App\Models\Subtes;
use App\Models\Soalesai;

class TambahSoalController extends Controller
{
    /**
     * Show the form for adding or editing soal pilgan.
     * 
     * @param int $tryout_id
     * @param int $subtes_id
     * @param int|null $soal_id
     * @return \Illuminate\View\View
     */
    public function formPilgan($tryout_id, $subtes_id, $soal_id = null)
    {
        // Get jumlah_soal from subtes
        $subtes = Subtes::findOrFail($subtes_id);
        $jumlah_soal = $subtes->jumlah_soal;

        // Fetch used question numbers from all question types for this tryout and subtes
        $used_pilgan = Soalpilgan::where('tryout_id', $tryout_id)->where('subtes_id', $subtes_id)->pluck('nomor_soal')->toArray();
        $used_esai = Soalesai::where('tryout_id', $tryout_id)->where('subtes_id', $subtes_id)->pluck('nomor_soal')->toArray();

        $used_numbers = array_unique(array_merge($used_pilgan, $used_esai,));

        if ($soal_id) {
            // Edit mode: fetch soal data
            $soal = Soalpilgan::findOrFail($soal_id);
            $mode = 'edit';
        } else {
            // Add mode: empty soal data
            $soal = null;
            $mode = 'add';
        }

        return view('admin.tambah_soal.pilgan', compact('tryout_id', 'subtes_id', 'soal', 'jumlah_soal', 'mode', 'used_numbers'));
    }

    /**
     * Store a newly created soal pilgan in database.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $tryout_id
     * @param int $subtes_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePilgan(Request $request, $tryout_id, $subtes_id)
    {
        $validated = $request->validate([
            'nomer-soal' => 'required|integer',
            'soal' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'jawaban.a' => 'required|string',
            'jawaban.b' => 'required|string',
            'jawaban.c' => 'required|string',
            'jawaban.d' => 'required|string',
            'jawaban.e' => 'required|string',
            'kunci-jawaban' => 'required|string|in:a,b,c,d,e',
        ]);

        $soalpilgan = new Soalpilgan();
        $soalpilgan->tryout_id = $tryout_id;
        $soalpilgan->subtes_id = $subtes_id;
        $soalpilgan->nomor_soal = $validated['nomer-soal'];
        $soalpilgan->soal = $validated['soal'];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('soal_gambar', 'public');
            $soalpilgan->gambar = $path;
        }

        $soalpilgan->jawaban_a = $validated['jawaban']['a'];
        $soalpilgan->jawaban_b = $validated['jawaban']['b'];
        $soalpilgan->jawaban_c = $validated['jawaban']['c'];
        $soalpilgan->jawaban_d = $validated['jawaban']['d'];
        $soalpilgan->jawaban_e = $validated['jawaban']['e'];
        $soalpilgan->kunci_jawaban = $validated['kunci-jawaban'];

        $soalpilgan->save();

        return redirect()->route('kelolasubtes.index', ['tryout_id' => $tryout_id, 'subtes_id' => $subtes_id])
            ->with('success', 'Soal Pilgan berhasil disimpan.');
    }

    /**
     * Update the specified soal pilgan in database.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $tryout_id
     * @param int $subtes_id
     * @param int $soal_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePilgan(Request $request, $tryout_id, $subtes_id, $soal_id)
    {
        $validated = $request->validate([
            'nomer-soal' => 'required|integer',
            'soal' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'jawaban.a' => 'required|string',
            'jawaban.b' => 'required|string',
            'jawaban.c' => 'required|string',
            'jawaban.d' => 'required|string',
            'jawaban.e' => 'required|string',
            'kunci-jawaban' => 'required|string|in:a,b,c,d,e',
        ]);

        $soalpilgan = Soalpilgan::findOrFail($soal_id);
        $soalpilgan->nomor_soal = $validated['nomer-soal'];
        $soalpilgan->soal = $validated['soal'];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('soal_gambar', 'public');
            $soalpilgan->gambar = $path;
        }

        $soalpilgan->jawaban_a = $validated['jawaban']['a'];
        $soalpilgan->jawaban_b = $validated['jawaban']['b'];
        $soalpilgan->jawaban_c = $validated['jawaban']['c'];
        $soalpilgan->jawaban_d = $validated['jawaban']['d'];
        $soalpilgan->jawaban_e = $validated['jawaban']['e'];
        $soalpilgan->kunci_jawaban = $validated['kunci-jawaban'];

        $soalpilgan->save();

        return redirect()->route('kelolasubtes.index', ['tryout_id' => $tryout_id, 'subtes_id' => $subtes_id])
            ->with('success', 'Soal Pilgan berhasil diperbarui.');
    }

    /**
     * Show the form for adding or editing soal esai.
     * 
     * @param int $tryout_id
     * @param int $subtes_id
     * @param int|null $soal_id
     * @return \Illuminate\View\View
     */
    public function formEsai($tryout_id, $subtes_id, $soal_id = null)
    {
        $subtes = Subtes::findOrFail($subtes_id);
        $jumlah_soal = $subtes->jumlah_soal;

        // Fetch used question numbers from all question types for this tryout and subtes
        $used_pilgan = Soalpilgan::where('tryout_id', $tryout_id)->where('subtes_id', $subtes_id)->pluck('nomor_soal')->toArray();
        $used_esai = Soalesai::where('tryout_id', $tryout_id)->where('subtes_id', $subtes_id)->pluck('nomor_soal')->toArray();

        $used_numbers = array_unique(array_merge($used_pilgan, $used_esai,));

        if ($soal_id) {
            $soal = Soalesai::findOrFail($soal_id);
            $mode = 'edit';
        } else {
            $soal = null;
            $mode = 'add';
        }

        return view('admin.tambah_soal.esai', compact('tryout_id', 'subtes_id', 'soal', 'jumlah_soal', 'mode', 'used_numbers'));
    }

    /**
 * Store a newly created soal esai in database.
 * 
 * @param \Illuminate\Http\Request $request
 * @param int $tryout_id
 * @param int $subtes_id
 * @return \Illuminate\Http\RedirectResponse
 */
public function storeEsai(Request $request, $tryout_id, $subtes_id)
{
    $validated = $request->validate([
        'nomer-soal' => 'required|integer',
        'soal' => 'required|string',
        'gambar' => 'nullable|image|max:2048',
        'kunci-esai' => 'required|string',
    ]);

    $soalesai = new Soalesai();
    $soalesai->tryout_id = $tryout_id;
    $soalesai->subtes_id = $subtes_id;
    $soalesai->nomor_soal = $validated['nomer-soal'];
    $soalesai->soal = $validated['soal'];
    $soalesai->kunci_jawaban = $validated['kunci-esai'];

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('soal_gambar', 'public');
        $soalesai->soal_gambar = $path;
    }

    $soalesai->save();

    return redirect()->route('kelolasubtes.index', ['tryout_id' => $tryout_id, 'subtes_id' => $subtes_id])
        ->with('success', 'Soal Esai berhasil disimpan.');
}

/**
 * Update the specified soal esai in database.
 * 
 * @param \Illuminate\Http\Request $request
 * @param int $tryout_id
 * @param int $subtes_id
 * @param int $soal_id
 * @return \Illuminate\Http\RedirectResponse
 */
public function updateEsai(Request $request, $tryout_id, $subtes_id, $soal_id)
{
    $validated = $request->validate([
        'nomer-soal' => 'required|integer',
        'soal' => 'required|string',
        'gambar' => 'nullable|image|max:2048',
        'kunci-esai' => 'required|string',
    ]);

    $soalesai = Soalesai::findOrFail($soal_id);
    $soalesai->nomor_soal = $validated['nomer-soal'];
    $soalesai->soal = $validated['soal'];
    $soalesai->kunci_jawaban = $validated['kunci-esai'];

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('soal_gambar', 'public');
        $soalesai->soal_gambar = $path;
    }

    $soalesai->save();

    return redirect()->route('kelolasubtes.index', ['tryout_id' => $tryout_id, 'subtes_id' => $subtes_id])
        ->with('success', 'Soal Esai berhasil diperbarui.');
}
}
