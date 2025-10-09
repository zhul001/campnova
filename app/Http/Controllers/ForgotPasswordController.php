<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Mail\SendOtpCode;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // Show form to input email for OTP
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Handle sending OTP to email
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }

        // Check if OTP was sent recently (cooldown 3 minutes)
        if (Cache::has('otp_cooldown_' . $email)) {
            $secondsLeft = Cache::get('otp_cooldown_' . $email) - time();
            if ($secondsLeft > 0) {
                return back()->withErrors(['email' => "Tunggu $secondsLeft detik sebelum mengirim ulang kode OTP"])->withInput();
            }
        }

        // Generate 6 digit OTP
        $otp = rand(100000, 999999);

        // Store OTP and expiry (2 minutes) in cache
        Cache::put('otp_' . $email, $otp, now()->addMinutes(2));
        Cache::put('otp_cooldown_' . $email, time() + 180, now()->addMinutes(3));

        // Send OTP email
        Mail::to($email)->send(new SendOtpCode($otp));

        // Store email in session for verification and reset steps
        session(['otp_email' => $email]);

        return redirect()->route('password.verifyForm')->with('success', 'Kode OTP telah dikirim ke email Anda');
    }

    // Show OTP verification form
    public function showVerifyForm()
    {
        if (!session()->has('otp_email')) {
            return redirect()->route('password.request')->withErrors(['email' => 'Silakan masukkan email terlebih dahulu']);
        }
        return view('auth.verify-code');
    }

    // Handle OTP verification
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp1' => 'required|digits:1',
            'otp2' => 'required|digits:1',
            'otp3' => 'required|digits:1',
            'otp4' => 'required|digits:1',
            'otp5' => 'required|digits:1',
            'otp6' => 'required|digits:1',
        ]);

        $email = session('otp_email');
        if (!$email) {
            return redirect()->route('password.request')->withErrors(['email' => 'Silakan masukkan email terlebih dahulu']);
        }

        $cachedOtp = Cache::get('otp_' . $email);
        if (!$cachedOtp) {
            return back()->withErrors(['otp' => 'Kode OTP salah atau kadaluarsa'])->withInput();
        }

        $inputOtp = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4') . $request->input('otp5') . $request->input('otp6');

        if ($inputOtp != $cachedOtp) {
            return back()->withErrors(['otp' => 'Kode OTP salah atau kadaluarsa'])->withInput();
        }

        // OTP is valid, remove from cache
        Cache::forget('otp_' . $email);
        Cache::forget('otp_cooldown_' . $email);

        // Mark OTP verified in session
        session(['otp_verified' => true]);

        return redirect()->route('password.resetForm');
    }

    // Show reset password form
    public function showResetForm()
    {
        if (!session('otp_verified')) {
            return redirect()->route('password.request')->withErrors(['email' => 'Silakan verifikasi kode OTP terlebih dahulu']);
        }
        return view('auth.reset-password');
    }

    // Handle password reset
    public function resetPassword(Request $request)
    {
        if (!session('otp_verified') || !session('otp_email')) {
            return redirect()->route('password.request')->withErrors(['email' => 'Silakan verifikasi kode OTP terlebih dahulu']);
        }

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $email = session('otp_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors(['email' => 'Email tidak ditemukan']);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Clear session data
        session()->forget(['otp_email', 'otp_verified']);

        return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
