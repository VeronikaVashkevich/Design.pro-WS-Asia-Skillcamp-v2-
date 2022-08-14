<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesignRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/sign-up', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/sign-in', [AuthController::class, 'signIn'])->name('signIn');

Route::get('/update-counter', [IndexController::class, 'updateCounter'])->name('updateCounter');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/request/create', [DesignRequestController::class, 'create'])->name('requests.create');
    Route::post('/request/store', [DesignRequestController::class, 'store'])->name('requests.store');
    Route::post('/request/destroy/{designRequest}', [DesignRequestController::class, 'destroy'])->name('requests.destroy');

    Route::get('/request/edit/{request}', [DesignRequestController::class, 'edit'])
        ->middleware('checkUserRole')
        ->name('requests.edit');

    Route::put('/request/update', [DesignRequestController::class, 'update'])
        ->middleware('checkUserRole')
        ->name('requests.update');

    Route::get('/admin-panel', [HomeController::class, 'adminPanel'])
        ->middleware('checkUserRole')
        ->name('adminPanel');
});
