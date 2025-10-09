<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Subtes;
use App\Models\Soalpilgan; // Perhatikan penulisan model
use App\Models\Soalesai;   // Perhatikan penulisan model
use App\Models\JawabanPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembahasanController extends Controller
{
    public function show($tryout_id, $subtes_id)
    {
        // Ambil data tryout
        $tryout = Tryout::findOrFail($tryout_id);
        
        // Ambil data subtes
        $subtes = Subtes::findOrFail($subtes_id);
        
        // Ambil user ID
        $user_id = Auth::id();
        
        // Ambil semua soal pilihan ganda untuk subtes ini
        $soalPilgans = Soalpilgan::where('tryout_id', $tryout_id)
            ->where('subtes_id', $subtes_id)
            ->orderBy('nomor_soal')
            ->get();
            
        // Ambil semua soal esai untuk subtes ini - DIPERBAIKI
        $soalEsais = Soalesai::where('tryout_id', $tryout_id) // Menggunakan Soalesai, bukan Soalesais
            ->where('subtes_id', $subtes_id)
            ->orderBy('nomor_soal')
            ->get();
            
        // Ambil semua jawaban peserta untuk user ini, tryout ini, dan subtes ini
        $jawabanPesertas = JawabanPeserta::where('user_id', $user_id)
            ->where('tryout_id', $tryout_id)
            ->where('subtes_id', $subtes_id)
            ->get()
            ->keyBy(function($item) {
                return $item->soal_pilgan_id ? 'pilgan_' . $item->soal_pilgan_id : 'esai_' . $item->soal_esai_id;
            });

        return view('user.pembahasan', compact(
            'tryout', 
            'subtes', 
            'soalPilgans', 
            'soalEsais', 
            'jawabanPesertas'
        ));
    }
}