<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Techer\TecherController;
use App\Http\Controllers\User\UserController;
Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

### SuperAdmin ###
Route::get('/Superadmin/index', [SuperAdminController::class, 'index'])->name('SuperAdmin');

### Admin ###
Route::get('/Admin/index', [AdminController::class, 'index'])->name('Admin');

### Techer ###
Route::get('/Techer/index', [TecherController::class, 'index'])->name('Techer');

### User ###
Route::get('/User/index', [UserController::class, 'index'])->name('User');
Route::get('/User/guruhlar', [UserController::class, 'Guruhlar'])->name('Guruhlar');
Route::get('/User/tolovlar', [UserController::class, 'Tolovlar'])->name('Tolovlar');
Route::get('/User/contact', [UserController::class, 'Contact'])->name('Contact');
Route::get('/User/kabinet', [UserController::class, 'Kabinet'])->name('Kabinet');