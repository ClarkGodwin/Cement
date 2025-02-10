<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login; 
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes(['verify' => false]); 

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/all', function(){
    return view('pages.all');
})->name('all'); 

Route::get('/details', function(){
    return view('pages.details');
})->name('details');

Route::get('/login', function(){
    return view('pages.auth.login'); 
})->name('login'); 

Route::post('/login', [Login::class, 'login']); 

Route::post('/logout', [Login::class, 'logout'])->name('logout'); 

Route::get('/register', function(){
    return view('pages.auth.register'); 
})->name('register'); 

Route::post('/register', [Register::class, 'store']);

Route::get('/sell', function(){
    return view('pages.sell'); 
})->name('sell'); 

Route::get('email/verify', function(){
    return view('pages.auth.verify_email');
})->middleware('auth')->name('verification.notice');

// Route::get('email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
//     $request->fulfill();
//     return redirect(''); 
// })->middleware(['auth', 'signed'])->name('verification.verify'); 

// Route::post('email/verification_notification', function(Request $request){
//     $request->user()->sendEmailVerificationNotofication();
//     return back()->with('success', 'Email de validation envoye'); 
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify'); 

Route::post('/email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend'); 

