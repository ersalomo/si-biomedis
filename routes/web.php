<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PasienController,
    AnamnesaController,
    AuthController,
    Dashboard
};




Route::get('/', fn () => to_route('admin.home'));
Route::group(
    [
        'middleware' => ['guest:web'],
        'prefix' => 'o',
        'as' => 'auth.'
    ],
    function () {
        Route::get('login', [AuthController::class, 'index'])->name('index');
        Route::post('login', [AuthController::class, 'login'])->name('login');
    }
);

Route::group([
    'middleware' => ['auth:web'],
    'prefix' => 'd',
    'as' => 'admin.',
], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [Dashboard::class, 'index'])->name('home');

    Route::controller(PasienController::class)->group(function () {
        Route::get('show-data-pasien', 'showDataPasien')->name('data-pasien');
        Route::get('tambah-pasien', 'tambahPasien')->name('tambah-pasien');
        Route::post('create-pasien', 'create')->name('create-pasien');
    });

    Route::controller(AnamnesaController::class)->group(function () {
        Route::get('show-data-anamnesa', 'showDataAnamnesa')->name('data-anamnesa');
        Route::get('tambah-anamnesa/{pasien:uuid?}', 'tambahAnamnesa')->name('tambah-anamnesa');
        Route::post('tambah', 'create')->name('create-anamnesa');
    });
});
