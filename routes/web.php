<?php

use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Doctor\DiagnoseController;
use App\Http\Controllers\Doctor\PrescriptionController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', function () {
        return view('home');
    });

    Route::prefix('setup')->middleware(['admin-user'])->group(function () {
        Route::put('/user/{user}/changePassword', [UserController::class, 'changePassword'])->name('user.changePassword');
        Route::resource('/user', 'Admin\UserController');

        Route::resource('/department', 'Admin\DepartmentController');

        Route::resource('/employee', 'Admin\EmployeeController');

        Route::resource('/patient', 'Admin\PatientController');

        // additional routes which are not part of the resource
        Route::post('/patient/checkin', [PatientController::class, 'checkin'])->name('patient.checkin');
    });

    Route::prefix('doctor')->middleware(['doctor-user'])->group(function(){
        Route::get('/diagnose/{patient}/create', [DiagnoseController::class, 'create'])->name('diagnose.create');
        Route::post('/diagnose/{patient}/store', [DiagnoseController::class, 'store'])->name('diagnose.store');
        Route::get('/diagnose/{patient}/show', [DiagnoseController::class, 'show'])->name('diagnose.show');
        Route::post('/diagnose/{diagnose}/destroy', [DiagnoseController::class, 'destroy'])->name('diagnose.destroy');
        Route::get('/patient', [\App\Http\Controllers\Doctor\PatientController::class, 'index'])->name('doctor.patient');


        Route::post('/prescription/{prescription}/destroy', [PrescriptionController::class, 'destroy'])->name('prescription.destroy');

    });

});

//Route::get('/options', [\App\Http\Controllers\SetupController::class, 'doctors']);

