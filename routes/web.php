<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAppointmentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/over-ons', 'over-ons')->name('over-ons');
Route::view('/contact', 'contact')->name('contact');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return 'Je bent ingelogd.';
})->middleware('auth')->name('dashboard');
Route::get('/diensten', [ServiceController::class, 'index'])->name('services.index');
Route::get('/afspraak-maken', [AppointmentController::class, 'create'])->middleware('auth')->name('appointments.create');
Route::post('/afspraak-maken', [AppointmentController::class, 'store'])->middleware('auth')->name('appointments.store');
Route::get('/mijn-afspraken', [AppointmentController::class, 'index'])->middleware('auth')->name('appointments.index');
Route::patch('/mijn-afspraken/{appointment}', [AppointmentController::class, 'cancel'])
    ->middleware('auth')
    ->name('appointments.cancel');

//  Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/afspraken', [ AdminAppointmentController::class,'index',])->name('appointments.index');

    Route::patch('/afspraken/{appointment}/bevestigen', [ AdminAppointmentController::class,'confirm',])->name('appointments.confirm');
    Route::patch('/afspraken/{appointment}/annuleren', [ AdminAppointmentController::class,'cancel',])->name('appointments.cancel');

    // Diensten CRUD
    Route::get('/diensten', [ ServiceController::class,'adminIndex',])->name('services.index');
    Route::get('/diensten/aanmaken', [ServiceController::class,'create',])->name('services.create');
    Route::post('/diensten', [ServiceController::class,'store',])->name('services.store');
    Route::get('/diensten/{service}/bewerken', [ServiceController::class,'edit',])->name('services.edit');
    Route::put('/diensten/{service}', [ ServiceController::class,'update',])->name('services.update');
    Route::delete('/diensten/{service}', [ServiceController::class,'destroy',])->name('services.destroy');
});
