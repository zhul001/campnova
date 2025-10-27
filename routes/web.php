<?php

use Illuminate\Support\Facades\{
    Route,
    Auth
};

use App\Http\Controllers\{
    UserController,
    TryoutController,
    KelolaSubtesController,
    TambahSoalController,
    ProfileController,
    AuthController,
    ExamController,
    PembahasanController,
    HasilTryoutController
};

use App\Http\Middleware\IsAdmin;


Route::get('/', function () {
    return view('homepage');
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/tryout/{tryout_id}/{subtes_id}/tambahpilgan', [TambahSoalController::class, 'formPilgan'])->name('pilgan.tambah');
    Route::get('/tryout/{tryout_id}/{subtes_id}/editpilgan/{soal_id}', [TambahSoalController::class, 'formPilgan'])->name('pilgan.edit');
    Route::post('/tryout/{tryout_id}/{subtes_id}/pilgan/store', [TambahSoalController::class, 'storePilgan'])->name('pilgan.store');
    Route::post('/tryout/{tryout_id}/{subtes_id}/pilgan/update/{soal_id}', [TambahSoalController::class, 'updatePilgan'])->name('pilgan.update');

    Route::get('/tryout/{tryout_id}/{subtes_id}/tambahesai', [TambahSoalController::class, 'formEsai'])->name('esai.tambah');
    Route::get('/tryout/{tryout_id}/{subtes_id}/editsoal/{soal_id}', [TambahSoalController::class, 'formEsai'])->name('esai.edit');
    Route::post('/tryout/{tryout_id}/{subtes_id}/esai/store', [TambahSoalController::class, 'storeEsai'])->name('esai.store');
    Route::post('/tryout/{tryout_id}/{subtes_id}/esai/update/{soal_id}', [TambahSoalController::class, 'updateEsai'])->name('esai.update');
});

Route::middleware('auth')->get('/dashboard', [UserController::class, 'ShowUsers']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/tryout', [TryoutController::class, 'index'])->name('tryout.index');
    Route::post('/tryout', [TryoutController::class, 'store'])->name('tryout.store');
    Route::patch('/tryout/{id}', [TryoutController::class, 'update'])->name('tryout.update');
    Route::delete('/tryout/{id}', [TryoutController::class, 'destroy'])->name('tryout.destroy');
    Route::get('/tryout/{id}', [TryoutController::class, 'show'])->name('tryout.show');
    Route::patch('/tryout/{id}/toggle-status', [TryoutController::class, 'toggleStatus'])->name('tryout.toggle-status');
    Route::post('/tryout/{id}/reset', [TryoutController::class, 'reset'])->name('tryout.reset');
    Route::get('/tryout/{tryout}/result', [HasilTryoutController::class, 'show'])->name('tryout.result');
    Route::get('/tryout/{tryoutId}/hasil', [HasilTryoutController::class, 'adminHasilTryout'])->name('admin.hasil_tryout');
    Route::get('/tryout/{tryoutId}/peringkat', [HasilTryoutController::class, 'leaderboard'])->name('tryout.leaderboard');
    Route::get('/tryout/{tryout_id}/{subtes_id}/pembahasan', [PembahasanController::class, 'show'])->name('pembahasan.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/tryout/{tryout_id}/{subtes_id}', [KelolaSubtesController::class, 'index'])->name('kelolasubtes.index');

    Route::delete('/soalpilgan/{id}', [KelolaSubtesController::class, 'destroySoalpilgan'])->name('soalpilgan.destroy');
    Route::delete('/soalesai/{id}', [KelolaSubtesController::class, 'destroySoalesai'])->name('soalesai.destroy');
    Route::delete('/soaltabel1/{id}', [KelolaSubtesController::class, 'destroySoalTabel1'])->name('soaltabel1.destroy');
    Route::delete('/soaltabel2/{id}', [KelolaSubtesController::class, 'destroySoalTabel2'])->name('soaltabel2.destroy');
});    

Route::middleware('auth')->group(function () {
    Route::match(['GET', 'PUT'], '/me/edit/major', [ProfileController::class, 'handleMajor'])
        ->name('profile.major');

    Route::get('/me', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::get('/me/edit', [ProfileController::class, 'editProfile'])->name('profile.edit'); // Ini bisa menangkap `/me/edit/major` jika ditempatkan di atas
    Route::post('/me/edit', [ProfileController::class, 'updateProfile'])->name('profile.update');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('register');
});

Route::get('/materi', function () {
    return view('user.materi');
});

Route::get('/jadwal', function () {
    return view('user.jadwal');
});

Route::get('/mailserver', function () {
    return view('debian.mailserver');
});

Route::get('/beranda', function () {
    return view('debian.home');
});

Route::get('/proxyserver', function () {
    return view('debian.proxy-blocked');
});

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendOtp'])->name('password.sendOtp');

Route::get('/verify-code', [AuthController::class, 'showVerifyForm'])->name('password.verifyForm');
Route::post('/verify-code', [AuthController::class, 'verifyOtp'])->name('password.verifyOtp');
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('otp.resend');

Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.resetForm');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::prefix('tryout')->middleware(['auth'])->group(function () {
    Route::get('/{tryout_id}/{subtes_id}/exam', [App\Http\Controllers\ExamController::class, 'showExam'])
        ->name('tryout.exam');

    Route::post('/{tryout_id}/{subtes_id}/submit-exam', [App\Http\Controllers\ExamController::class, 'submitExam'])
        ->name('tryout.submitExam');
});

