<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Setups\UserController;

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

Route::middleware('auth')->group(function(){

    Route::get('/', function () {
    return view('home');
});
    Route::prefix('setup')->group(function(){
        Route::resource('/user', 'Setups\UserController');
    });
});

Route::get('/options', function (){
});

