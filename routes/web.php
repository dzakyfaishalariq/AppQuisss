<?php

use App\Models\datadiri;
use App\Models\Soal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\soalController;
use App\Http\Controllers\datadiriController;

/**
 * projek 1 
 * Author : Dzaky Faishalariq
 * Aplikasi : QUIS 
 * deskripsi hanya membuat prototype sebelum di gabungkan ke dalam projek lain
 */

Route::get('/', function () {
    return view('hUtama', ['title' => 'Home']);
});
Route::get('/isidata', function () {
    return view('isidatadiri', ['title' => 'Isi Data']);
});
Route::get('/tabeldatadiri', function () {
    $data = datadiri::all();
    return view('tabeldatadiri', ['title' => 'Tabel Data', 'data' => $data]);
});
Route::get('/quis', function () {
    return view('token', ['title' => 'Token']);
});
Route::get('/buatSoal', function () {
    $data = Soal::all();
    return view('b_soal', ['title' => 'Buat Soal', 'data' => $data]);
});
Route::get('/soal', function () {
    return view('quis', ['title' => 'Quis']);
});

Route::post('/tambahdatadiri', [datadiriController::class, 'store']);
Route::post('/validasitoken', [datadiriController::class, 'validasi']);
Route::post('/tambahsoal', [soalController::class, 'store']);
Route::post('/kelolajawaban', [soalController::class, 'area_quis']);
Route::put('/editsoal/{soal}', [soalController::class, 'update']);
Route::put('/editdatadiri/{datadiri}', [datadiriController::class, 'update']);
Route::get('/hapusdatadiri/{datadiri}', [datadiriController::class, 'delete']);
Route::get('/hapussoal/{soal}', [soalController::class, 'delete']);
