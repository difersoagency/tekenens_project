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
Route::view('/', 'pages.main')->name('main_page');
Route::view('/about', 'pages.about')->name('about_page');
Route::view('/portfolio', 'pages.portfolio')->name('portfolio_page');
Route::view('/contact', 'pages.contact')->name('contact_page');
