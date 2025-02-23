<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login; 
use App\Http\Controllers\Tables\Carts;
use App\Http\Controllers\Tables\Items;
use App\Http\Controllers\Tables\Orders;
use App\Http\Controllers\Tables\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use function Dom\import_simplexml;

Auth::routes(['verify' => true]); 

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [Controller::class, 'home'])->name('home');

Route::get('/all', [Controller::class, 'all'])->name('all'); 

Route::get('/details/{id}', [Items::class, 'user_view_details'])->name('details');

Route::get('/login', function(){
    return view('pages.auth.login'); 
})->name('login'); 

Route::post('/login', [Login::class, 'login']); 


Route::get('email/verify', function(){
    return view('pages.auth.verify_email');
})->middleware('auth')->name('verification.notice');

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify'); 

Route::post('/email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend'); 

Route::post('/send_message', [ChatbotController::class, 'send_message'])->name('send_message'); 



Route::group(['middleware' => ['auth']], function(){
    Route::get('/profile', [User::class, 'show'])->name('profile');

    Route::group(['middleware' => ['verified']], function(){
        Route::get('/profile-edit/{id}', [User::class, 'edit'])->name('profile-edit'); 
        Route::post('/profile-update', [User::class, 'update'])->name('profile-update');
        
        Route::get('/logout', [Login::class, 'logout'])->name('logout'); 
        
        Route::get('/register', function(){
            return view('pages.auth.register'); 
        })->name('register'); 
        
        Route::post('/register', [Register::class, 'store']);
        
        Route::get('/sell', function(){
            return view('pages.sell'); 
        })->name('sell'); 

        Route::post('/sell', [Items::class, 'store'])->name('sell');
        
        Route::get('/items-list/{id_user}', [Items::class, 'list'])->name('items-list');
        
        Route::get('/items-details/{id}', [Items::class, 'details'])->name('items-details');
        
        Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard'); 
        
        Route::get('/admin_user', function(){
            return view('pages.admin.user'); 
        })->name('admin_user'); 
        
        Route::get('/image-delete/{id_image}', [Items::class, 'image_delete'])->name('image-delete'); 
        
        Route::post('/image-add', [Items::class, 'image_add'])->name('image-add'); 
        
        Route::post('/item-update', [Items::class, 'update'])->name('item-update'); 
        
        Route::post('/item-delete', [Items::class, 'delete'])->name('item-delete');
        
        Route::post('/sold', [Items::class, 'sold'])->name('sold');
        
        Route::post('/carts_add', [Carts::class, 'add'])->name('carts_add');
        
        Route::get('/cart_item-delete/{id}', [Carts::class, 'cart_item_delete'])->name('cart_item-delete');
        
        Route::get('/order/{id_idem}', [Orders::class, 'add'])->name('order'); 
        
        Route::get('/delete-account/{id}', [User::class, 'delete'])->name('delete-account'); 
    });

}); 

