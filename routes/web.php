<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerkController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','is_admin']], function () {
    // dash
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // 
    Route::get('/admin/merk', [MerkController::class, 'index'])->name('merk');
    Route::get('/admin/merk/add', [MerkController::class, 'create'])->name('merk.add');
    Route::post('/admin/merk/insert', [MerkController::class, 'store'])->name('merk.insert');
    Route::get('/admin/merk/edit/{id}', [MerkController::class, 'edit'])->name('merk.edit');
    Route::post('/admin/merk/update/{id}', [MerkController::class, 'update'])->name('merk.update');
    Route::get('/admin/merk/delete/{id}', [MerkController::class, 'destroy'])->name('merk.delete');
    
    // 
});
