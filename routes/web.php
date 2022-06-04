<?php

use Illuminate\Support\Facades\Route;

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
