<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::middleware(['auth.check'])->group(function () 
{
    Route::get('/dashboard', [newsController::class,'dashboard'])->name('dashboard');
  
});

Route::get('/login', [userController::class,'index'])->name('login.show');
Route::post('/login', [userController::class,'login'])->name('login');