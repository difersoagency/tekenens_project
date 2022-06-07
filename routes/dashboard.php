<?php


use Illuminate\Support\Facades\Route;

Auth::routes();

//Login Method
Route::prefix('admin')->group(function () {
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
        Route::group(['prefix' => '/description'], function () {
            Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_home_description'])->name('home.description.create');
            Route::post('/store', [App\Http\Controllers\DashboardController::class, 'store_home_description'])->name('home.description.store');
            Route::get('/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_home_description'])->name('home.description.edit');
            Route::put('/update/{id}', [App\Http\Controllers\DashboardController::class, 'update_home_description'])->name('home.description.update');
        });
    });
    Route::group(['prefix' => '/article'], function () {
        Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_article'])->name('article.show');
        Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_article'])->name('article.create');
        Route::post('/store', [App\Http\Controllers\DashboardController::class, 'store_article'])->name('article.store');
        Route::get('/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_article'])->name('article.edit');
        Route::put('/update/{id}', [App\Http\Controllers\DashboardController::class, 'update_article'])->name('article.update');
        Route::delete('/delete', [App\Http\Controllers\DashboardController::class, 'delete_article']);
    });
    Route::group(['prefix' => '/contact'], function () {
        Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_contact'])->name('contact.show');
        Route::put('/post/{type}/{id}', [App\Http\Controllers\DashboardController::class, 'update_contact'])->name('update.contact');
    });

    Route::group(['prefix' => '/partner'], function () {
        Route::post('/store', [App\Http\Controllers\DashboardController::class, 'store_partner'])->name('partner.store');
        Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_partner'])->name('partner.create');
        Route::get('/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_partner'])->name('partner.edit');
        Route::put('/update/{id}', [App\Http\Controllers\DashboardController::class, 'update_partner'])->name('partner.update');
        Route::delete('/delete', [App\Http\Controllers\DashboardController::class, 'delete_partner']);
    });


    Route::group(['prefix' => '/portofolio'], function () {
        Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_portofolio'])->name('portofolio.show');
        Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_portofolio'])->name('portofolio.create');
        Route::post('/store', [App\Http\Controllers\DashboardController::class, 'store_portofolio'])->name('portofolio.store');
        Route::post('/storeMedia', [App\Http\Controllers\DashboardController::class, 'storeMedia_portofolio'])->name('portofolio.storeMedia');
        Route::get('/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_portofolio'])->name('portofolio.edit');
        Route::put('/update/{id}', [App\Http\Controllers\DashboardController::class, 'update_portofolio'])->name('portofolio.update');
        Route::delete('/delete', [App\Http\Controllers\DashboardController::class, 'delete_portofolio']);
    });

    Route::group(['prefix' => '/job_vacancy'], function () {
        Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_job_vacancy'])->name('job_vacancy.show');
        Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_job_vacancy'])->name('job_vacancy.create');
        Route::post('/store', [App\Http\Controllers\DashboardController::class, 'store_job_vacancy'])->name('job_vacancy.store');
        Route::get('/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_job_vacancy'])->name('job_vacancy.edit');
        Route::put('/update/{id}', [App\Http\Controllers\DashboardController::class, 'update_job_vacancy'])->name('job_vacancy.update');
        Route::delete('/delete', [App\Http\Controllers\DashboardController::class, 'delete_job_vacancy']);
    });

    Route::group(['prefix' => '/team'], function () {
        Route::get('/show', [App\Http\Controllers\DashboardController::class, 'show_team'])->name('team.show');
        Route::get('/create', [App\Http\Controllers\DashboardController::class, 'create_team'])->name('team.create');
        Route::post('/store', [App\Http\Controllers\DashboardController::class, 'store_team'])->name('team.store');
        Route::get('/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit_team'])->name('team.edit');
        Route::put('/update/{id}', [App\Http\Controllers\DashboardController::class, 'update_team'])->name('team.update');
    });
    Route::view('/datatable', 'admin.tables.data-tables.datatable-AJAX')->name('datatable');
});
