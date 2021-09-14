<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
    Route::get('/gitars', 'Admin\GitarsController@index')->name('gitars');
    Route::get('/gitars/add', 'Admin\GitarsController@add')->name('gitars.add');
    Route::post('/gitars/insert', 'Admin\GitarsController@insert')->name('gitars.insert');
    Route::get('/gitars/edit/{id}', 'Admin\GitarsController@edit')->name('gitars.edit');
    Route::post('/gitars/update/{id}', 'Admin\GitarsController@update')->name('gitars.update');
    Route::get('/gitars/delete/{id}', 'Admin\GitarsController@delete')->name('gitars.delete');
});
