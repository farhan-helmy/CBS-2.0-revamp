<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('index');
    });
    
    Route::prefix('appointment')->name('appointment.')->group(function () {
        Route::get('set', [AppointmentController::class, 'index'])->name('set');
        Route::get('sets/{user}', [AppointmentController::class, 'set'])->name('sets');
        Route::get('search', [AppointmentController::class, 'search'])->name('search');
        Route::get('queue', [AppointmentController::class, 'queue'])->name('queue');
        Route::get('records', [AppointmentController::class, 'records'])->name('records');
        Route::get('queue/{user}/finish', [AppointmentController::class, 'finishQueue'])->name('finishes');
        Route::get('show/{user}', [AppointmentController::class, 'show'])->name('show');
        Route::post('finish', [AppointmentController::class, 'saveFinish'])->name('finish');
    });
    
    Route::prefix('patient')->name('patient.')->group(function () {
        Route::get('add', [PatientController::class, 'index'])->name('index');
        Route::get('records', [PatientController::class, 'records'])->name('records');
        Route::post('add', [PatientController::class, 'savePatient'])->name('add');
    });

    Route::post('/logout', [AccountController::class, 'destroy'])->name('logout');

});



Route::post('/auth', [AccountController::class, 'authenticate'])->name('auth');
Route::get('/', [AccountController::class, 'index'])->name('login');
