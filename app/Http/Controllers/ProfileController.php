<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\PilihanJurusan;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', [
            'user' => $user,
            'editMode' => false,
        ]);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('profile', [
            'user' => $user,
            'editMode' => true,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Dapatkan ID user yang login
        $userId = Auth::id();
        
        if (!$userId) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu');
        }

        // Validasi input
        $validatedData = $request->validate([
            'nama_panjang' => 'required|string|max:255',
            'nama_pendek' => 'required|string|max:255',
        ]);

        try {
            // Dapatkan user instance dengan cara yang lebih eksplisit
            $user = \App\Models\User::find($userId);
            
            if (!$user) {
                throw new \Exception('User tidak ditemukan dalam database');
            }

            // Update data dengan cara manual + save()
            $user->nama_panjang = $validatedData['nama_panjang'];
            $user->nama_pendek = $validatedData['nama_pendek'];
            
            // Gunakan save() sebagai fallback
            if (!$user->save()) {
                throw new \Exception('Gagal menyimpan perubahan');
            }

            return redirect()->route('profile.show')
                   ->with('success', 'Profil berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()
                   ->withInput()
                   ->withErrors('Terjadi error: ' . $e->getMessage());
        }
    }

    public function handleMajor(Request $request)
{
    $user = Auth::user();
    
    if ($request->isMethod('put')) {
        $data = $request->only([
            'perguruan_tinggi1', 'program_studi1',
            'perguruan_tinggi2', 'program_studi2', 
            'perguruan_tinggi3', 'program_studi3',
            'perguruan_tinggi4', 'program_studi4'
        ]);

        try {
            if ($user->pilihanJurusan) {
                $user->pilihanJurusan->update($data);
            } else {
                PilihanJurusan::create(array_merge(['user_id' => $user->id], $data));
            }

            // Clear user relation cache untuk memastikan data fresh
            
            // Check if it's an AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pilihan jurusan berhasil disimpan!',
                    'hasPilihanJurusan' => true
                ]);
            }

            return redirect()->route('profile.major')
                   ->with('success', 'Pilihan jurusan berhasil disimpan!')
                   ->with('hasPilihanJurusan', true);
            
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('profile.major')
                   ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    $pilihan = $user->pilihanJurusan;
    
    // Check if it's an AJAX request
    if ($request->ajax()) {
        return response()->json([
            'pilihan' => $pilihan
        ]);
    }

    return view('major', compact('pilihan'));
}
}
