<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VisaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//*********************prfile Route */
Route::get('/profile', [ProfilController::class, 'index'])->name('profile');
Route::put('/profile/update', [ProfilController::class, 'update'])->name('profile.update');


//********************Visa Route */
Route::get('/Visas', [VisaController::class, 'index'])->name('visas');
Route::get('/Visas/trashed', [VisaController::class, 'VisaTrashed'])->name('visas.trashed');
Route::get('/Visa/Issue', [VisaController::class, 'create'])->name('visa.issue');
Route::post('/Visa/store', [VisaController::class, 'store'])->name('visa.store');
Route::get('/Visa/show/{slug}', [VisaController::class, 'show'])->name('visa.show');
Route::get('/Visa/edit/{id}', [VisaController::class, 'edit'])->name('visa.edit');
Route::post('/Visa/update/{id}', [VisaController::class, 'update'])->name('visa.update');
Route::get('/Visa/destroy/{id}', [VisaController::class, 'destroy'])->name('visa.destroy');
Route::get('/Visa/hdelete/{id}', [VisaController::class, 'hdelete'])->name('visa.hdelete');
Route::get('/Visa/restore/{id}', [VisaController::class, 'restore'])->name('visa.restore');



