<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Setups\UserController;
use App\Http\Controllers\Setups\DepartmentController;

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

    Route::prefix('setup')->group(function () {
        Route::put('/user/{user}/changePassword', [UserController::class, 'changePassword'])->name('user.changePassword');
        Route::resource('/user', 'Setups\UserController');

        Route::resource('/department', 'Setups\DepartmentController');
    });

});

Route::get('/options', function () {
});

