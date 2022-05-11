<?php

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
    Route::get('/get/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('forget_pwd.get');
    Route::post('/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('forget_pwd.reset');
});

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
