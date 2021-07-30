<?php

use App\Http\Controllers\Admin\PatientController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;

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
        Route::get('/patient', [\App\Http\Controllers\Doctor\PatientController::class, 'index'])->name('doctor.patient');
        Route::get('/{patient}/diagnose', [\App\Http\Controllers\Doctor\PatientController::class, 'diagnose'])->name('doctor.diagnose');
        Route::post('/{patient}/diagnose_add', [\App\Http\Controllers\Doctor\PatientController::class, 'diagnose_add'])->name('doctor.diagnose_add');
    });

});

//Route::get('/options', [\App\Http\Controllers\SetupController::class, 'doctors']);

