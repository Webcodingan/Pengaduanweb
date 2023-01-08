<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('frontend.main');
});

Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::resource('role', 'RoleController')->middleware('auth');

Route::resource('permission', 'PermissionController')->middleware('auth');

Route::resource('pengaduan', 'PengaduanController')->middleware('auth');

Route::get('/user/pengaduan', 'PengaduanController@pengaduanUser')->middleware('auth');

Route::resource('tanggapan', 'TanggapanController')->middleware('auth');

Route::get('/laporan', 'PengaduanController@laporan')->middleware('auth');

Route::get('/laporan/cetak', 'PengaduanController@pdf')->middleware('auth');



