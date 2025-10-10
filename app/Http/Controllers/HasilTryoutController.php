<?php

namespace App\Http\Controllers;

use App\Models\HasilTryout;
use App\Models\HasilSubtes;
use App\Models\Tryout;
use App\Models\PilihanJurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilTryoutController extends Controller
{
    public function show($tryoutId)
    {
        $user = Auth::user();
        
        $tryout = Tryout::findOrFail($tryoutId);
        
        $hasilTryout = HasilTryout::where('user_id', $user->id)
            ->where('tryout_id', $tryoutId)
            ->firstOrFail();
            
        $hasilSubtes = HasilSubtes::where('user_id', $user->id)
            ->where('tryout_id', $tryoutId)
            ->with('subtes')
            ->get();
            
        $totalParticipants = HasilTryout::where('tryout_id', $tryoutId)->count();
        $rank = HasilTryout::where('tryout_id', $tryoutId)
            ->where('total_score', '>', $hasilTryout->total_score)
            ->count() + 1;
            
        return view('user.hasil_tryout', [
            'user' => $user,
            'tryout' => $tryout,
            'hasilTryout' => $hasilTryout,
            'hasilSubtes' => $hasilSubtes,
            'rank' => $rank,
            'totalParticipants' => $totalParticipants
        ]);
    }

    public function leaderboard($tryoutId)
{
    $tryout = Tryout::findOrFail($tryoutId);
    
    $leaderboardData = HasilTryout::where('tryout_id', $tryoutId)
        ->with(['user.pilihanJurusan' => function($query) {
            $query->select('user_id', 'perguruan_tinggi1', 'program_studi1');
        }])
        ->orderBy('total_score', 'DESC')
        ->limit(100)
        ->get();
    
    $totalParticipants = HasilTryout::where('tryout_id', $tryoutId)->count();
    
    return view('user.peringkat', [
        'tryout' => $tryout,
        'participants' => $leaderboardData,
        'totalParticipants' => $totalParticipants
    ]);
}

public function adminHasilTryout($tryoutId)
{
    $tryout = Tryout::findOrFail($tryoutId);
    
    $hasilTryouts = HasilTryout::where('tryout_id', $tryoutId)
        ->with(['user'])
        ->orderBy('total_score', 'DESC')
        ->get();
    
    foreach ($hasilTryouts as $hasilTryout) {
        $hasilTryout->hasilSubtes = HasilSubtes::where('user_id', $hasilTryout->user_id)
            ->where('tryout_id', $tryoutId)
            ->with('subtes')
            ->get();
    }
        
    return view('admin.hasil_tryout', [
        'tryout' => $tryout,
        'hasilTryouts' => $hasilTryouts
    ]);
}
}