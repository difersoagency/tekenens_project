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

// @include_once('admin_web.php');

// Route::get('/', function () {
//     return redirect()->route('index');
// })->name('/');

// Route::view('sample-page', 'admin.pages.sample-page')->name('sample-page');

// Route::prefix('dashboard')->group(function () {
//     Route::view('/', 'admin.dashboard.default')->name('index');
//     Route::view('default', 'admin.dashboard.default')->name('dashboard.index');
// });

// Route::view('default-layout', 'multiple.default-layout')->name('default-layout');
// Route::view('compact-layout', 'multiple.compact-layout')->name('compact-layout');
// Route::view('modern-layout', 'multiple.modern-layout')->name('modern-layout');
Auth::routes();

//Login Method

Route::view('/', 'auth.login')->name('dash_login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



Route::group(['prefix' => '/forget_pwd'], function () {
    Route::view('/show', 'auth.passwords.reset')->name('forget_pwd.show');
    Route::post('/post', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget_pwd.post');
    Route::get('/get/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetPasswordForm'])->name('forget_pwd.get');
    Route::post('/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'submitResetPasswordForm'])->name('forget_pwd.reset');
});
Route::get('/index', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::group(['prefix' => '/home'], function () {
    Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_home'])->name('home.show');
    Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_home'])->name('home.create');
});
Route::group(['prefix' => '/article'], function () {
    Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_article'])->name('article.show');
    Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_article'])->name('article.create');
});
Route::group(['prefix' => '/portofolio'], function () {
    Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_portofolio'])->name('portofolio.show');
    Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_portofolio'])->name('portofolio.create');
});

Route::group(['prefix' => '/job_vacancy'], function () {
    Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_job_vacancy'])->name('job_vacancy.show');
    Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_job_vacancy'])->name('job_vacancy.create');
});
Route::group(['prefix' => '/team'], function () {
    Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_team'])->name('team.show');
    Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_team'])->name('team.create');
    Route::post('/store', [App\Http\Controllers\DashboardController::class, 'store_team'])->name('team.store');
    Route::get('/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_team'])->name('team.edit');
    Route::put('/update/{id}', [App\Http\Controllers\DashboardController::class, 'update_team'])->name('team.update');
});
Route::view('/datatable', 'admin.tables.data-tables.datatable-AJAX')->name('datatable');
