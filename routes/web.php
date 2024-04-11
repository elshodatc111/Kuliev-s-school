<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\KabinetController;
use App\Http\Controllers\SuperAdmin\HodimlarController;
use App\Http\Controllers\SuperAdmin\FilialController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HodimController;
use App\Http\Controllers\Admin\AdminGuruhController;
use App\Http\Controllers\Admin\AdminTecherController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Techer\TecherController;
use App\Http\Controllers\User\UserController;

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

### Start SuperAdmin ###
Route::get('/Superadmin/index', [SuperAdminController::class, 'index'])->name('SuperAdmin');
Route::get('/Superadmin/hisobot', [SuperAdminController::class, 'hisobot'])->name('hisobot');
Route::get('/Superadmin/statistika', [SuperAdminController::class, 'statistika'])->name('statistika');
    ###Filiallar###
Route::get('/Superadmin/filial', [FilialController::class, 'filial'])->name('filial');
Route::get('/Superadmin/filial/show/{id}', [FilialController::class, 'show'])->name('filial.show');
Route::get('/Superadmin/filailCrm/{id}', [FilialController::class, 'filailCrm'])->name('filailCrm');
Route::get('/Superadmin/room/delete/{id}', [FilialController::class, 'roomdelete'])->name('roomdelete');
Route::get('/Superadmin/setting/tulov/deleted/{id}', [FilialController::class, 'tulovSettingDelete'])->name('tulovSettingDelete');
Route::post('/Superadmin/setting/tulov/create', [FilialController::class, 'tulovSettingCreate'])->name('tulovSettingCreate');
Route::post('/Superadmin/room/create', [FilialController::class, 'roomcreate'])->name('roomcreate');
Route::post('/Superadmin/filial', [FilialController::class, 'filialcreate'])->name('filialcreate');
Route::post('/Superadmin/cours/create', [FilialController::class, 'filialCoursCreate'])->name('filialCoursCreate');
    ###Hodimlar###
Route::get('/Superadmin/hodimlar', [HodimlarController::class, 'hodimlar'])->name('hodimlar');
Route::post('/Superadmin/hodimlar', [HodimlarController::class, 'hodimCreate'])->name('hodimCreate');
Route::get('/Superadmin/del/{id}', [HodimlarController::class, 'HodimDeletes'])->name('HodimDeletes');
Route::get('/Superadmin/pass/{id}', [HodimlarController::class, 'HodimPassword'])->name('HodimPassword');
    ###Kabinet###
Route::get('/Superadmin/kabinet', [KabinetController::class, 'kabinet'])->name('kabinet');
Route::put('/Superadmin/kabinet/{id}', [KabinetController::class, 'kabinetUpdate'])->name('kabinetUpdate');
Route::put('/Superadmin/kabinet/password/{id}', [KabinetController::class, 'kabinetPassword'])->name('kabinetPassword');
### Emd SuperAdmin ###
### Admin ###
Route::get('/Admin/index', [AdminController::class, 'index'])->name('Admin');
Route::get('/Admin/student/index', [AdminStudentController::class, 'index'])->name('Student');
Route::get('/Admin/student/index/{id}', [AdminStudentController::class, 'show'])->name('StudentShow');
Route::get('/Admin/student/debit', [AdminStudentController::class, 'debit'])->name('StudentQarzdorlar');
Route::get('/Admin/student/pays', [AdminStudentController::class, 'pays'])->name('StudentTulovlar');
Route::get('/Admin/student/create', [AdminStudentController::class, 'create'])->name('StudentCreate');
Route::post('/Admin/student/story', [AdminStudentController::class, 'store'])->name('StudentCreateStore');
Route::post('/Admin/guruh/guruh/plus', [AdminStudentController::class, 'guruhPlus'])->name('AdminUserGuruhPlus');

Route::get('/Admin/guruh', [AdminGuruhController::class, 'index'])->name('AdminGuruh');
Route::get('/Admin/guruh/show/{id}', [AdminGuruhController::class, 'show'])->name('AdminGuruhShow');
Route::get('/Admin/guruh/end', [AdminGuruhController::class, 'endGuruh'])->name('AdminGuruhEnd');
Route::get('/Admin/guruh/create', [AdminGuruhController::class, 'CreateGuruh'])->name('AdminGuruhCreate');
Route::post('/Admin/guruh/create1', [AdminGuruhController::class, 'CreateGuruh1'])->name('AdminGuruhCreate1');
Route::post('/Admin/guruh/create2', [AdminGuruhController::class, 'CreateGuruh2'])->name('AdminGuruhCreate2');
Route::post('/Admin/guruh/deleteUser', [AdminGuruhController::class, 'guruhDelUser'])->name('guruhDeletesUserss');

Route::get('/Admin/admin/techer', [AdminTecherController::class, 'index'])->name('AdminTecher');
Route::post('/Admin/admin/techer', [AdminTecherController::class, 'techerCreate'])->name('AdminTecherCreate');
Route::post('/Admin/admin/techer/update', [AdminTecherController::class, 'techerUpdate'])->name('AdminTecherUpdate');
Route::post('/Admin/admin/techer/update/password', [AdminTecherController::class, 'techerUpdatePassword'])->name('AdminTecherUpdatePassword');
Route::get('/Admin/admin/techer/show/{id}', [AdminTecherController::class, 'techerShow'])->name('AdminTecherShow');
Route::get('/Admin/admin/techer/delete/{id}', [AdminTecherController::class, 'techerDelete'])->name('AdminTecherDelete');
Route::get('/Admin/hodim/kabinet', [HodimController::class, 'kabinet'])->name('adminkabinet');
Route::get('/Admin/hodim/', [HodimController::class, 'adminHodimlar'])->name('adminHodimlar');
Route::get('/Admin/hodim/{id}', [HodimController::class, 'adminHodim'])->name('adminHodim');
Route::get('/Admin/hodim/delete/{id}', [HodimController::class, 'adminHodimDelete'])->name('adminHodimDelete');
Route::post('/Admin/hodim/create', [HodimController::class, 'adminCreateHodimlar'])->name('adminCreateHodimlar');
Route::post('/Admin/hodim/clear/statistika', [HodimController::class, 'adminClearHodimlarStatistik'])->name('adminClearHodimlarStatistik');
Route::post('/Admin/hodim/update/user', [HodimController::class, 'adminUpdateHodimlarUser'])->name('adminUpdateHodimlarUser');
Route::post('/Admin/hodim/update/password', [HodimController::class, 'adminUpdateHodimlarPassword'])->name('adminUpdateHodimlarPassword');
Route::post('/Admin/hodim/pay/ishhaqi', [HodimController::class, 'adminPayHodimlarIshHaqi'])->name('adminPayHodimlarIshHaqi');
Route::get('/Admin/hodim/pay/ishhaqi/delete/{id}', [HodimController::class, 'adminPayHodimlarIshHaqiDelete'])->name('adminPayHodimlarIshHaqiDelete');
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