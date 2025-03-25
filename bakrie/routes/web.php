<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('pegawai', PegawaiController::class);

Route::get('/dashboard', function () {
    $totalActive = \App\Models\Pegawai::where('isactive', 'active')->count();
    $totalMale   = \App\Models\Pegawai::where('isactive', 'active')->where('kelamin', 'Laki-laki')->count();
    $totalFemale = \App\Models\Pegawai::where('isactive', 'active')->where('kelamin', 'Perempuan')->count();

    return view('dashboard', compact('totalActive', 'totalMale', 'totalFemale'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth:admin,web'])->group(function () {
    //Route::get('/admin/dashboard', [PegawaiController::class, 'dashboard']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pegawai/{nip}/history', [PegawaiController::class, 'history'])->name('pegawai.history');
    Route::get('/pegawai/{nip}/newjabatan', [PegawaiController::class, 'newJabatan'])->name('pegawai.newjabatan');
    Route::post('/pegawai/newjabatan', [PegawaiController::class, 'storeNewJabatan'])->name('pegawai.storeNewJabatan');
    Route::resource('pegawai', PegawaiController::class);
});

require __DIR__.'/admin-auth.php';
require __DIR__.'/auth.php';
