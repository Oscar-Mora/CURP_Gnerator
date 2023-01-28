<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::controller(UserController::class)->group(function(){

    Route::get('users','index', function () {
    return view('index');
    })->name('users.index');

    Route::get('users/create','create')->name('users.create');
    
    Route::post('users/{user}/edit','edit', function () {
        return view('edit');
    })->name('users.edit'); 
});
Route::post('users/',[UserController::class,'store'])->name('users.store');

Route::get('users/{user}',[UserController::class,'show'])->name('users.show');

Route::put('users/{user}',[UserController::class,'update'])->name('users.update');

Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');

Route::get('user-curp/{user}/',[UserController::class,'create_curp'])->name('users.curp');  