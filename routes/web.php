<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PanelController;
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
        Route::get('show/{user}', [PatientController::class, 'show'])->name('show');
        Route::get('edit/{user}', [PatientController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [PatientController::class, 'update'])->name('update');
    });

    Route::prefix('panel')->name('panel.')->group(function () {
        Route::get('', [PanelController::class, 'index'])->name('index');
        Route::post('store', [PanelController::class, 'store'])->name('store');
        Route::get('records', [PanelController::class, 'records'])->name('records');
        

    });

    Route::prefix('doctor')->name('doctor.')->group(function () {
        Route::get('', [DoctorController::class, 'index'])->name('index');
        Route::get('show/{user}', [DoctorController::class, 'show'])->name('show');
        Route::get('destroy/{user}', [DoctorController::class, 'destroy'])->name('destroy');
        Route::get('edit/{user}', [DoctorController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [DoctorController::class, 'update'])->name('update');
        Route::get('create', [DoctorController::class, 'create'])->name('create');
        Route::post('store', [DoctorController::class, 'store'])->name('store');

    });

    Route::post('/logout', [AccountController::class, 'destroy'])->name('logout');

});



Route::post('/auth', [AccountController::class, 'authenticate'])->name('auth');
Route::get('/', [AccountController::class, 'index'])->name('login');
