<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login; 
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

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
    return view('pages.login'); 
})->name('login'); 

Route::post('/login', [Login::class, 'login']); 

Route::post('/logout', [Login::class, 'logout'])->name('logout'); 

Route::get('/register', function(){
    return view('pages.register'); 
})->name('register'); 

Route::post('/register', [Register::class, 'store']);

Route::get('/sell', function(){
    return view('pages.sell'); 
})->name('sell'); 
