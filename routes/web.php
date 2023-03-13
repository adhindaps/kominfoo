<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BeritaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('/postlogin', [AdminController::class, 'postlogin'])->name('postlogin');
Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
Route::get('/beranda',[AdminController::class, 'beranda'])->name('beranda');

Route::get('/', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('register');
});

////////////////////////PENGUMUMUMAN///////////////////////////////////////////
Route::get('/pengumumanindex', [PengumumanController::class, 'index'])->name('pengumumanindex');
Route::get('/pengumumancreate', [PengumumanController::class, 'create'])->name('pengumumanscreate');
Route::post('/pengumumanstore',[PengumumanController::class, 'pengumumanstore'])->name('pengumumanstore');
Route::get('/pengumumanedit/{id}',[PengumumanController::class, 'pengumumanedit'])->name('pengumumanedit');
Route::post('/pengumumanupdate/{id}',[PengumumanController::class, 'pengumumanupdate'])->name('pengumumanupdate');
Route::get('/deletepengumuman/{id}',[PengumumanController::class, 'deletepengumuman'])->name('deletepengumuman');

/////////////////////////////////////ABOUT///////////////////////////////////////
Route::get('/aboutindex', [AboutController::class, 'index'])->name('aboutindex');
Route::get('/aboutcreate', [AboutController::class, 'create'])->name('aboutscreate');
Route::post('/aboutstore',[AboutController::class, 'aboutstore'])->name('aboutstore');
Route::get('/aboutedit/{id}',[AboutController::class, 'aboutedit'])->name('aboutedit');
Route::post('/aboutupdate',[AboutController::class, 'aboutupdate'])->name('aboutupdate');
Route::get('/deleteabout/{id}',[AboutController::class, 'deleteabout'])->name('deleteabout');

//////////////////////////////////BERITA-ADMIN////////////////////////////////
Route::get('/beritaindex',[BeritaController::class, 'beritaindex'])->name('beritaindex')->middleware('auth');
Route::get('/beritacreate',[BeritaController::class, 'beritacreate'])->name('beritacreate');
Route::post('/beritastore',[BeritaController::class, 'beritastore'])->name('beritastore');
Route::get('/beritaedit/{id}',[BeritaController::class, 'beritaedit'])->name('beritaedit');
Route::post('/beritaupdate/{id}',[BeritaController::class, 'beritaupdate'])->name('beritaupdate');
Route::get('/beritahapus/{id}',[BeritaController::class, 'beritahapus'])->name('beritahapus');
