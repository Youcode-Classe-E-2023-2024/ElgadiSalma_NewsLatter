<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\mediaController;

// Route::get('/', function () {
//     return "dd";
// });


Route::middleware(['auth.check'])->group(function () 
{
    
    Route::get('/dashboard', [subscribeController::class,'showSubscriberStatistics'])->name('showSubscriberStatistics');

    Route::get('/template', [newsController::class,'showDeletedTemplates'])->name('admin.template');
    Route::post('/template/{id}', [newsController::class,'restoreTemplate'])->name('restore.template');    
    Route::post('/template/{id}', [newsController::class,'sendTemplate'])->name('send.newsletter');    

    Route::get('/subscribers', [subscribeController::class,'showSubscriberList'])->name('list.subscribers');    
    Route::delete('/subscribers/{id}', [subscribeController::class,'deleteSubscriber'])->name('delete.subscriber'); 

    Route::get('/media', [mediaController::class,'showMedia'])->name('media.show');    
    Route::post('/media', [mediaController::class,'addMedia'])->name('add.media');    
    Route::delete('/media/{id}', [mediaController::class,'deleteMedia'])->name('delete.media');    

    Route::get('/templates', [newsController::class,'templates'])->name('templates');
    Route::post('/templates/{id}', [newsController::class,'editTemplate'])->name('edit.template');
    Route::delete('/templates/{id}', [newsController::class,'deleteTemplate'])->name('delete.template');

    Route::get('/addTemplate',[newsController::class,'addTemplate_show'])->name('addTemplate.show');
    Route::post('/addTemplate',[newsController::class,'addTemplate'])->name('addTemplate');
  
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

