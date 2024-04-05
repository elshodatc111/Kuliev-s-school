<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\KabinetController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Techer\TecherController;
use App\Http\Controllers\User\UserController;
Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

### SuperAdmin ###
Route::get('/Superadmin/index', [SuperAdminController::class, 'index'])->name('SuperAdmin');
Route::get('/Superadmin/filial', [SuperAdminController::class, 'filial'])->name('filial');
Route::get('/Superadmin/hisobot', [SuperAdminController::class, 'hisobot'])->name('hisobot');
Route::get('/Superadmin/statistika', [SuperAdminController::class, 'statistika'])->name('statistika');
Route::get('/Superadmin/hodimlar', [SuperAdminController::class, 'hodimlar'])->name('hodimlar');
Route::get('/Superadmin/kabinet', [KabinetController::class, 'kabinet'])->name('kabinet');
Route::put('/Superadmin/kabinet/{id}', [KabinetController::class, 'kabinetUpdate'])->name('kabinetUpdate');
Route::put('/Superadmin/kabinet/password/{id}', [KabinetController::class, 'kabinetPassword'])->name('kabinetPassword');

### Admin ###
Route::get('/Admin/index', [AdminController::class, 'index'])->name('Admin');

### Techer ###
Route::get('/Techer/index', [TecherController::class, 'index'])->name('Techer');
Route::get('/Techer/guruhlar', [TecherController::class, 'Guruhlar'])->name('TGuruhlar');
Route::get('/Techer/tulovlar', [TecherController::class, 'Tolovlar'])->name('TTolovlar');
Route::get('/Techer/kabinet', [TecherController::class, 'Kabinet'])->name('TKabinet');

### User ###
Route::get('/User/index', [UserController::class, 'index'])->name('User');
Route::get('/User/guruhlar', [UserController::class, 'Guruhlar'])->name('Guruhlar');
Route::get('/User/tolovlar', [UserController::class, 'Tolovlar'])->name('Tolovlar');
Route::get('/User/contact', [UserController::class, 'Contact'])->name('Contact');
Route::get('/User/kabinet', [UserController::class, 'Kabinet'])->name('Kabinet');