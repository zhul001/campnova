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
        // Get authenticated user
        $user = Auth::user();
        
        // Get tryout data
        $tryout = Tryout::findOrFail($tryoutId);
        
        // Get user's tryout result
        $hasilTryout = HasilTryout::where('user_id', $user->id)
            ->where('tryout_id', $tryoutId)
            ->firstOrFail();
            
        // Get all subtests results for this tryout
        $hasilSubtes = HasilSubtes::where('user_id', $user->id)
            ->where('tryout_id', $tryoutId)
            ->with('subtes') // assuming you have a relationship with Subtes model
            ->get();
            
        // Calculate rank (this might be expensive for large datasets)
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
    // Get tryout data
    $tryout = Tryout::findOrFail($tryoutId);
    
    // Get all tryout results ordered by total_score descending
    $leaderboardData = HasilTryout::where('tryout_id', $tryoutId)
        ->with(['user.pilihanJurusan' => function($query) {
            $query->select('user_id', 'perguruan_tinggi1', 'program_studi1');
        }])
        ->orderBy('total_score', 'DESC')
        ->limit(100) // Limit to top 100 participants
        ->get();
    
    // Get total participants
    $totalParticipants = HasilTryout::where('tryout_id', $tryoutId)->count();
    
    return view('user.peringkat', [
        'tryout' => $tryout,
        'participants' => $leaderboardData,
        'totalParticipants' => $totalParticipants
    ]);
}

public function adminHasilTryout($tryoutId)
{
    // Get tryout data
    $tryout = Tryout::findOrFail($tryoutId);
    
    // Get all participants' results for this tryout
    $hasilTryouts = HasilTryout::where('tryout_id', $tryoutId)
        ->with(['user']) // hanya load user dulu
        ->orderBy('total_score', 'DESC')
        ->get();
    
    // Load hasilSubtes untuk setiap user secara manual
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