<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(DepanController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/siswa', 'siswa')->name('siswa');
    Route::get('/guru', 'guru')->name('guru');
    Route::get('/mapel', 'mapel')->name('mapel');
});

Route::controller(SiswaController::class)->group(function(){
    Route::get('/dataSiswa', 'index')->name('dataSiswa');
    Route::get('/tambahDataSiswa', 'create')->name('tambahDataSiswa');
    Route::get('/prosesTambahDataSiswa', 'store')->name('prosesTambahDataSiswa');
});

Route::controller(MapelController::class)->group(function(){
    Route::get('/dataMapel', 'index')->name('dataMapel');
    Route::get('/tambahDataMapel', 'create')->name('tambahDataMapel');
    Route::post('/prosesTambahDataMapel', 'store')->name('prosesTambahDataMapel');
});

Route::controller(GuruController::class)->group(function(){
    Route::get('/dataGuru', 'index')->name('dataGuru');
    Route::get('/tambahDataGuru', 'create')->name('tambahDataGuru');
});

Route::controller(KelasController::class)->group(function(){
    Route::get('/dataKelas', 'index')->name('dataKelas');
    Route::get('/tambahDataKelas', 'create')->name('tambahDataKelas');
    Route::get('/editDataKelas/{id}', 'edit')->name('editDataKelas');
    Route::post('/prosesTambahDataKelas', 'store')->name('prosesTambahDataKelas');
    Route::put('/prosesEditDataKelas/{id}', 'update')->name('prosesEditDataKelas');
    Route::delete('/deleteDataKelas/{id}', 'destroy')->name('deleteDataKelas');
});

Route::controller(JurusanController::class)->group(function(){
    Route::get('/dataJurusan', 'index')->name('dataJurusan');
    Route::get('/tambahDataJurusan', 'create')->name('tambahDataJurusan');
    Route::get('/editDataJurusan', 'create')->name('editDataJurusan');
    Route::post('/prosesTambahDataJurusan', 'store')->name('prosesTambahDataJurusan');
    Route::put('/prosesEditDataJurusan/{id}', 'update')->name('prosesEditDataJurusan');
    Route::delete('/prosesHapusDataJurusan/{id}', 'destroy')->name('prosesHapusDataJurusan');
});


Route::controller(AdminController::class)->group(function(){
    Route::get('/admin', 'index')->name('admin');
});
