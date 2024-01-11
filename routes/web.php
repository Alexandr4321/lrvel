<?php

use GuzzleHttp\Middleware;
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

    Route::get('/',[\App\Http\Controllers\IndexController::class, 'index'] )->name('home');

    Route::get('/posts',[\App\Http\Controllers\PostController::class, 'index'] )->name('posts.index');

    Route::get('/posts/{id}',[\App\Http\Controllers\PostController::class, 'show'] )->name('posts.show');

    Route::middleware("auth")->group(function(){
        
        Route::post('/posts/comment/{id}',[\App\Http\Controllers\PostController::class, 'comment'] )->name('comment');

        Route::get('/logout',[\App\Http\Controllers\AuthController::class, 'logout'] )->name('logout');

        
    });

    Route::middleware("guest")->group(function(){

        Route::get('/login',[\App\Http\Controllers\AuthController::class, 'showLoginForm'] )->name('login');

        Route::post('/login_process',[\App\Http\Controllers\AuthController::class, 'login'] )->name('login_process');

        Route::get('/register',[\App\Http\Controllers\AuthController::class, 'showRegisterForm'] )->name('register');

        Route::get('/register_process',[\App\Http\Controllers\AuthController::class, 'register'] )->name('register_process');

        Route::get('/forgot',[\App\Http\Controllers\AuthController::class, 'showForgotForm'] )->name('forgot');

        Route::post('/forgot_process',[\App\Http\Controllers\AuthController::class, 'forgot'] )->name('forgot_process');
    });
    Route::get('/contacts',[\App\Http\Controllers\IndexController::class, 'showContactForm'] )->name('contacts');
    Route::post('/contact_form_process',[\App\Http\Controllers\IndexController::class, 'contactForm'] )->name('contact_form_process');
    

    
// Route::prefix("news")->middleware("r")->group(function(){
//     Route::post('{id}',[\App\Http\Controllers\IndexController::class, 'index'] )->name('contact_form');

// });
