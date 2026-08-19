<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ALUMNI
    |--------------------------------------------------------------------------
    */
    Route::post('/alumni/import', [AlumniController::class, 'import'])
        ->name('alumni.import');

    Route::get('/alumni/export', [AlumniController::class, 'export'])
        ->name('alumni.export');

    Route::resource('alumni', AlumniController::class)
        ->parameters([
            'alumni' => 'alumni'
        ]);

    /*
    |--------------------------------------------------------------------------
    | PUBLIKASI
    |--------------------------------------------------------------------------
    */
    Route::post('/publikasi/import', [PublikasiController::class, 'import'])
        ->name('publikasi.import');

    Route::get('/publikasi/export', [PublikasiController::class, 'export'])
        ->name('publikasi.export');

    Route::resource('publikasi', PublikasiController::class);

    /*
    |--------------------------------------------------------------------------
    | REKOGNISI
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | DOKUMEN
    |--------------------------------------------------------------------------
    */
    // RUTE BARU: Untuk aksi klik tombol Lihat hijau langsung buka halaman pratinjau full tanpa data teks detail
    Route::get('/dokumen/{dokuman}/preview-direct', [DokumenController::class, 'previewDirect'])
        ->name('dokumen.preview.direct');

    Route::get('/dokumen/{dokuman}/file', [DokumenController::class, 'viewFile'])
        ->name('dokumen.file');

    Route::resource('dokumen', DokumenController::class)
        ->parameters([
            'dokumen' => 'dokuman'
        ]);

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */
    Route::prefix('laporan')->name('laporan.')->group(function () {

        Route::get(
            '/rekap-tempat-kerja',
            [LaporanController::class, 'rekapTempatKerja']
        )
            ->name('tempatkerja');

        Route::get(
            '/rekap-sumber-pengakuan',
            [LaporanController::class, 'rekapSumberPengakuan']
        )
            ->name('sumberpengakuan');

        Route::get(
            '/laporan/alumni-profesi-dosen',
            [LaporanController::class, 'alumniProfesiDosen']
        )
            ->name('alumniProfesiDosen');
    });

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
