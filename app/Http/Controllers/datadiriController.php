<?php

namespace App\Http\Controllers;

use App\Models\datadiri;
use Illuminate\Http\Request;

class datadiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah data
        $datadiri = new datadiri;
        $datadiri->nama = $request->nama;
        $datadiri->npm = $request->npm;
        //ubah string ke integer
        $semester = $request->semester;
        $datadiri->semester = (int)$semester;
        $datadiri->jurusan = $request->jurusan;
        //simpan data
        $datadiri->save();
        // memberikan pesan sudah tersimpan
        return redirect('/tabeldatadiri')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function show(datadiri $datadiri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function edit(datadiri $datadiri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datadiri $datadiri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datadiri  $datadiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(datadiri $datadiri)
    {
        //
    }
    public function validasi(Request $request)
    {
        //mengecek apakah nama dan npm ada di dalam data
        $nama = $request->nama;
        $npm = $request->npm;
        $data = datadiri::where('nama', $nama)->where('npm', $npm)->first();
        if ($data) {
            //jika ada maka akan menampilkan data
            return view('quis', ['title' => 'Quis', 'data' => $data]);
        } else {
            //jika tidak ada maka akan menampilkan pesan
            return redirect('/isidata')->with('status', 'Data tidak ditemukan silahkan daftar terlebih dahulu');
        }
    }
}
