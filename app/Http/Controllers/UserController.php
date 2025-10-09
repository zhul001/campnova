<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'shortname' => 'required|string|max:255',
            'fullname'  => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6',
            'birthdate' => 'required|date',
        ]);

        $user = User::create([
            'nama_pendek'    => $validated['shortname'],
            'nama_panjang'   => $validated['fullname'],
            'email'          => $validated['email'],
            'password'       => Hash::make($validated['password']),
            'tanggal_lahir'  => $validated['birthdate'],
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // penting
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->withInput();
    }

    public function showUsers()
{
    $user = Auth::user();

    if ($user->is_admin) {
        $users = User::with('pilihanJurusan')->where('is_admin', false)->get();
        return view('admin.dashboard', compact('users'));
    }

    return view('user.dashboard');
}
}
