<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->group(function () {
    // Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    // Route::get('/evaluasi/{course}', [MahasiswaController::class, 'formEvaluasi'])->name('mahasiswa.evaluasi');
    // Route::post('/evaluasi/{course}', [MahasiswaController::class, 'submitEvaluasi']);
});
