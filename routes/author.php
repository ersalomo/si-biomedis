<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    PasienController,
    AnamnesaController,
    AuthController,
    AdminProfileController,
    ObatController
};


Route::group([
    'middleware' => 'guest:web',
    'prefix' => 'o/auth',
    'as' => 'auth.'
], function () {
    Route::get('login', [AuthController::class, 'index'])->name('index');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::prefix('author')
    ->as('author.')
    ->middleware('auth:web')
    ->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::controller(PasienController::class)->group(function () {
            Route::get('show-data-pasien', 'showDataPasien')->name('data-pasien');
            Route::get('tambah-pasien', 'tambahPasien')->name('tambah-pasien');
            Route::post('create-pasien', 'store')->name('create-pasien'); // tidak boleh, dokter hanya bisa dilakukan oleh admin ke aatas
            Route::delete('delete-pasien/{pasien?}', 'delete')->name('delete-pasien'); // tidak boleh, dokter hanya bisa dilakukan oleh admin ke aatas
            Route::get('confirmation-delete/{id}', 'confirmationDelete')->name('confirmation-delete'); // tidak boleh, dokter hanya bisa dilakukan oleh admin ke aatas
            Route::get('get-pasiens', 'getDataPasiens')->name('get-patiens');
        });

        Route::controller(AnamnesaController::class)->group(function () {
            Route::get('show-data-anamnesa', 'showDataAnamnesa')->name('data-anamnesa');
            Route::get('tambah-anamnesa/{pasien:uuid?}', 'tambahAnamnesa')->name('tambah-anamnesa');
            Route::post('tambah', 'create')->name('create-anamnesa');  //tidak boleh ,admin hanya melihat data anamnesa
        });

        Route::get('my-profile', [AdminProfileController::class, 'profile'])->name('my-profile');
        Route::resource('obat', ObatController::class);
        Route::get('get-drugs', [ObatController::class, 'getDrugs'])->name('getDrugs');
    });
