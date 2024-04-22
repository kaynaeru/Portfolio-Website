<?php

use App\Http\Controllers\frontController;
use App\Http\Controllers\skillController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\pageController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pageSettingController;

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

Route::get('/',[frontController::class,"index"]);

Route::redirect('home','dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');

//ketika auth redirect bakal diarahkan ke gugel
Route::get('/auth/redirect', [authController::class,"redirect"])->middleware('guest');
 
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');

Route::get('/auth/logout', [authController::class,"logout"]);
require __DIR__.'/auth.php';

Route::prefix('dashboard')->middleware('auth')->group(
    function(){
        Route::get('/',[pageController::class, 'index']);
        Route::resource('page',pageController::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
        Route::get('skill',[skillController::class, "index"])->name('skill.index');
        Route::post('skill',[skillController::class, "update"])->name('skill.update');
        Route::get('profile',[profileController::class, "index"])->name('profile.index');
        Route::post('profile',[profileController::class, "update"])->name('profile.update');
        Route::get('pagesetting',[pageSettingController::class, "index"])->name('pagesetting.index');
        Route::post('pagesetting',[pageSettingController::class, "update"])->name('pagesetting.update');
    
    }
);
