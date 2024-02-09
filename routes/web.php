<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\userController;

// Route::get('/', function () {
//     return "dd";
// });


Route::middleware(['auth.check'])->group(function () 
{
    
    Route::get('/dashboard', [subscribeController::class,'showSubscriberStatistics'])->name('showSubscriberStatistics');
    Route::get('/subscribers', [subscribeController::class,'showSubscriberList'])->name('list.subscribers');    
    Route::delete('/subscribers/{id}', [subscribeController::class,'deleteSubscriber'])->name('delete.subscriber');    
    Route::get('/templates', [newsController::class,'templates'])->name('templates');
  
});

Route::get('/subscribe', [SubscribeController::class, 'subscribeShow'])->name('subscribe.show');
Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');
Route::post('/unsubscribe', [SubscribeController::class, 'unsubscribe'])->name('unsubscribe');

Route::get('/', [userController::class,'index'])->name('login.show');
Route::post('/login', [userController::class,'login'])->name('login');

Route::post('/logout', [userController::class,'logout'])->name('logout');

Route::post('/forgot-password', [userController::class, 'forgot_password'])->name('forgot_password');
Route::get('/forgot-password', [userController::class, 'forgot_show']);

Route::get('/reset-password/{token}', [userController::class, 'reset'])->name('reset');
Route::post('/reset-password/{token}', [userController::class, 'post_reset'])->name('post_reset');

