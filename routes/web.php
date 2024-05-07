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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth'])->group(function () {
  
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory');
    Route::get('inventory/create', [App\Http\Controllers\InventoryController::class, 'create'])->name('inventory.create');
    Route::post('inventory/create', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory.createProcess');
    Route::post('inventory/exportExcel', [App\Http\Controllers\InventoryController::class, 'exportExcel'])->name('inventory.exportExcel');
    Route::get('inventory/edit/{id}', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventory.edit');
    Route::post('inventory/edit/{id}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory.editProcess');
    Route::get('inventory/delete/{id}/{status}', [App\Http\Controllers\InventoryController::class, 'updateStatus'])->name('inventory.updateStatus');

    Route::get('pengajuan', [App\Http\Controllers\PengajuanController::class, 'index'])->name('pengajuan');
    Route::get('pengajuan/create', [App\Http\Controllers\PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('pengajuan/create', [App\Http\Controllers\PengajuanController::class, 'store'])->name('pengajuan.createProcess');
    Route::get('pengajuan/edit/{id}', [App\Http\Controllers\PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::post('pengajuan/edit/{id}', [App\Http\Controllers\PengajuanController::class, 'update'])->name('pengajuan.editProcess');
    Route::get('pengajuan/invoice/{id}', [App\Http\Controllers\PengajuanController::class, 'invoice'])->name('pengajuan.invoice');
    Route::get('pengajuan/exportPDF/{id}', [App\Http\Controllers\PengajuanController::class, 'exportPDF'])->name('pengajuan.exportPDF');
    Route::get('pengajuan/delete/{id}/{status}', [App\Http\Controllers\PengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');
    Route::get('pengajuan/updateStatus/{id}/{status}', [App\Http\Controllers\PengajuanController::class, 'updateStatusPengajuan'])->name('pengajuan.updateStatusPengajuan');

    Route::get('customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');
    Route::get('customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('customer/create', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.createProcess');
    Route::get('customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.editProcess');

    Route::get('attendance', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance');
    Route::get('attendance/create', [App\Http\Controllers\AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('attendance/create', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendance.createProcess');
    Route::post('attendance/importExcel', [App\Http\Controllers\AttendanceController::class, 'importExcel'])->name('attendance.importExcel');
    Route::get('attendance/edit/{id}', [App\Http\Controllers\AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::post('attendance/edit/{id}', [App\Http\Controllers\AttendanceController::class, 'update'])->name('attendance.editProcess');
    Route::get('attendance/delete/{id}', [App\Http\Controllers\AttendanceController::class, 'delete'])->name('attendance.delete');

    Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('user/create', [App\Http\Controllers\UserController::class, 'store'])->name('user.createProcess');
    Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('user/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.editProcess');
    Route::get('user/delete/{id}/{status}', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::get('user/setRole/{id}', [App\Http\Controllers\UserController::class, 'setRole'])->name('user.setRole');
    Route::post('user/setRole/{id}', [App\Http\Controllers\UserController::class, 'setRoleProcess'])->name('user.setRole.process');


    Route::get('roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
    Route::get('roles/create', [App\Http\Controllers\RolesController::class, 'create'])->name('roles.create');
    Route::post('roles/create', [App\Http\Controllers\RolesController::class, 'store'])->name('roles.createProcess');
    Route::get('roles/edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('roles.edit');
    Route::post('roles/edit/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('roles.editProcess');
    Route::get('roles/delete/{id}/{status}', [App\Http\Controllers\RolesController::class, 'updateStatus'])->name('roles.updateStatus');

    Route::get('report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
    Route::post('report/exportExcel', [App\Http\Controllers\ReportController::class, 'exportExcel'])->name('report.exportExcel');
    Route::get('report/invoice/{id}', [App\Http\Controllers\ReportController::class, 'invoice'])->name('report.invoice');
    Route::get('report/exportPDF/{id}', [App\Http\Controllers\ReportController::class, 'exportPDF'])->name('report.exportPDF');
    

    Route::get('test', [App\Http\Controllers\TestController::class, 'index'])->name('test');


});

 