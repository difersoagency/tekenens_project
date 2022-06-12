<?php

use App\Models\Team;
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

@include_once('dashboard.php');
Route::get('/', [App\Http\Controllers\HomeController::class, 'main'])->name('main');
Route::get('/about',[App\Http\Controllers\HomeController::class, 'about'] )->name('about');
Route::get('/portfolio',[App\Http\Controllers\HomeController::class,'portfolio'])->name('portfolio');
Route::get('/portfolio/data',[App\Http\Controllers\HomeController::class,'portfolio_data'])->name('portfolio_data');
Route::view('/contact', 'pages.contact')->name('contact_page');
