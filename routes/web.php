<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KameraController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\KembaliController;
use App\Http\Controllers\CustomerController;
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
    Route::get('/admin/user', [UserController::class, 'index'])->name('user');
    Route::get('/admin/user/add', [UserController::class, 'create'])->name('user.add');
    Route::post('/admin/user/insert', [UserController::class, 'store'])->name('user.insert');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    
    // 
    Route::get('/admin/kamera', [KameraController::class, 'index'])->name('kamera');
    Route::get('/admin/kamera/add', [KameraController::class, 'create'])->name('kamera.add');
    Route::post('/admin/kamera/insert', [KameraController::class, 'store'])->name('kamera.insert');
    Route::get('/admin/kamera/edit/{id}', [KameraController::class, 'edit'])->name('kamera.edit');
    Route::post('/admin/kamera/update/{id}', [KameraController::class, 'update'])->name('kamera.update');
    Route::get('/admin/kamera/delete/{id}', [KameraController::class, 'destroy'])->name('kamera.delete');
    
    // 
    Route::get('/admin/sewa', [SewaController::class, 'index'])->name('sewa');
    Route::get('/admin/sewa/add', [SewaController::class, 'create'])->name('sewa.add');
    Route::post('/admin/sewa/insert', [SewaController::class, 'store'])->name('sewa.insert');
    Route::get('/admin/sewa/pick/{id}', [SewaController::class, 'pick'])->name('sewa.pick');
    Route::get('/admin/sewa/delete/{id}', [SewaController::class, 'destroy'])->name('sewa.delete');
    // --
    Route::get('/admin/history/', [SewaController::class, 'history'])->name('sewa.history');
    Route::get('/admin/sewa/show/{$id}', [SewaController::class, 'show'])->name('sewa.show');
    
    // 
    Route::get('/admin/kembali', [KembaliController::class, 'index'])->name('kembali');
    Route::get('/admin/kembali/add/{id}', [KembaliController::class, 'create'])->name('kembali.add');
    Route::post('/admin/kembali/insert/{id}', [KembaliController::class, 'store'])->name('kembali.insert');
    Route::get('/admin/kembali/edit/{id}', [KembaliController::class, 'edit'])->name('kembali.edit');
    Route::post('/admin/kembali/update/{id}', [KembaliController::class, 'update'])->name('kembali.update');
    Route::get('/admin/kembali/delete/{id}', [KembaliController::class, 'destroy'])->name('kembali.delete');
    
    // 
    Route::get('/admin/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/admin/customer/add', [CustomerController::class, 'create'])->name('customer.add');
    Route::post('/admin/customer/insert', [CustomerController::class, 'store'])->name('customer.insert');
    Route::get('/admin/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/admin/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/admin/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');

});
