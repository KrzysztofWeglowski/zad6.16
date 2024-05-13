<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RepairController;
Route::get('/', function () {
    return view('welcome');
});




Route::controller(ServiceController::class)->group(function () {
    Route::get('/RepairVault', 'index')->name('RepairVault.main');
    Route::get('/RepairVault/create',  'create')->name('RepairVault.create');
    Route::post('/RepairVault',  'store')->name('RepairVault.store');
    Route::get('/RepairVault/{service}', 'edit')->name('RepairVault.edit');
    Route::put('/RepairVault/{service}','update')->name('RepairVault.update');
    Route::delete('/RepairVault/{service}',  'destroy')->name('RepairVault.destroy');

});

Route::controller(RepairController::class)->group(function () {
    Route::get('/repairs', 'index')->name('repairs.index');
    Route::get('/repairs/create',  'create')->name('repairs.create');
    Route::post('/repairs',  'store')->name('repairs.store');
    Route::get('/repairs/{repair}',  'edit')->name('repairs.edit');
    Route::put('/repairs/{repair}',  'update')->name('repairs.update');
    Route::delete('/repairs/{repair}',  'destroy')->name('repairs.destroy');

});
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});