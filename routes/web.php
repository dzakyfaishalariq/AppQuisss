<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\datadiriController;
use App\Models\datadiri;

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
Route::post('/tambahdatadiri', [datadiriController::class, 'store']);
Route::post('/validasitoken', [datadiriController::class, 'validasi']);
