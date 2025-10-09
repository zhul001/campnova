<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tryout;
use App\Models\Subtes;
use App\Models\Soalpilgan;
use App\Models\Soalesai;

class KelolaSubtesController extends Controller
{
    public function index($tryout_id, $subtes_id)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized');
        }

        $tryout = Tryout::findOrFail($tryout_id);
        $subtes = Subtes::findOrFail($subtes_id);

        $soalpilgans = Soalpilgan::where('subtes_id', $subtes_id)->get();
        $soalesais = Soalesai::where('subtes_id', $subtes_id)->get();

        return view('admin.kelolasubtes', [
            'tryout' => $tryout,
            'subtes' => $subtes,
            'soalpilgans' => $soalpilgans,
            'soalesais' => $soalesais,
            'tryoutId' => $tryout_id,
            'subtesId' => $subtes_id,
        ]);
    }

    public function destroySoalpilgan($id)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized');
        }

        $soalpilgan = Soalpilgan::findOrFail($id);
        $soalpilgan->delete();

        return redirect()->back()->with('success', 'Soal Pilgan berhasil dihapus.');
    }

    public function destroySoalesai($id)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized');
        }

        $soalesai = Soalesai::findOrFail($id);
        $soalesai->delete();

        return redirect()->back()->with('success', 'Soal Esai berhasil dihapus.');
    }
}
