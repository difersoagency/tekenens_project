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

Route::group(['prefix' => '/portfolio'], function() {
    Route::get('/data',[App\Http\Controllers\HomeController::class,'portfolio_data'])->name('portfolio_data');
    Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class,'detail_portofolio'])->name('detail_porto');
});

Route::get('/article',[App\Http\Controllers\HomeController::class,'article'])->name('article');
Route::get('/article/data',[App\Http\Controllers\HomeController::class,'article_data'])->name('article_data');
Route::get('/job_vacancy',[App\Http\Controllers\HomeController::class,'job_vacancy'])->name('job_vacancy');
Route::get('/job_vacancy/data',[App\Http\Controllers\HomeController::class,'job_vacancy_data'])->name('job_vacancy_data');
Route::get('/contact',[App\Http\Controllers\HomeController::class,'contact'])->name('contact');
Route::post('/send_mail',[App\Http\Controllers\HomeController::class,'send_request_meet'])->name('send_mail');

// Route::view('/404', 'pages.404')->name('404');

// Route::view('/email', 'pages.email')->name('email');