<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritaUserController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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
    return view('dash');
})->name('/');


Route::get('camera', function () {
    return view('camera');
})->name('camera');


Route::get('tampil',[UserController::class, 'tampil'])->name('tampil');
Route::get('tampil2',[StandarController::class, 'tampil2'])->name('tampil2');
Route::get('show2/{id}',[StandarController::class, 'show2'])->name('show2');

Route::resource('daftar', DaftarController::class);
Auth::routes();

Route::get('beritauser', [BeritaUserController::class,'GetNow'])->name('beritauser');

Route::match(['get', 'post'], '/register', function () {
    return redirect('/login');
})->name('register');


Route::group(['middleware' =>['auth','admin']],function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user',UserController::class);
    Route::resource('admin',AdminController::class);
    Route::get('btnLaporan',[UserController::class,'btnLaporan'])->name('btnLaporan');
    Route::get('cetakPdf/{tgl_awal}/{tgl_akhir}',[UserController::class,'cetakPdf'])->name('cetakPdf');
    Route::get('cetakId/{id}',[UserController::class,'cetakId'])->name('cetakId');
    Route::resource('berita',BeritaController::class);
    Route::resource('standar',StandarController::class);
});
