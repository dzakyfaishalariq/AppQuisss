<?php

namespace App\Http\Controllers;

use App\Models\datadiri;
use App\Models\Soal;
use App\Models\jawaban;
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
        //menampilkan data untuk di edit
        $data = $datadiri;
        $title = 'Edit Data';
        return view('/editdatadiri', compact('data', 'title'));
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
        //ubah data
        $datadiri->nama = $request->nama;
        $datadiri->npm = $request->npm;
        //ubah string ke integer
        $semester = $request->semester;
        $datadiri->semester = (int)$semester;
        $datadiri->jurusan = $request->jurusan;
        //simpan data
        $datadiri->save();
        // memberikan pesan sudah tersimpan
        return redirect('/tabeldatadiri')->with('status', 'Data berhasil diubah');
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
            $data_soal = Soal::all();
            //$data_jawaban = jawaban::all();
            //mengambil data pertama
            //$soal1 = $data_soal->first();
            //mengambil data kedua
            return view(
                'quis',
                [
                    'data_soal' => $data_soal,
                    'data' => $data,
                    'title' => 'Quis'
                ]
            );
        } else {
            //jika tidak ada maka akan menampilkan pesan
            return redirect('/isidata')->with('status', 'Data tidak ditemukan silahkan daftar terlebih dahulu');
        }
    }
    public function delete(datadiri $datadiri)
    {
        //hapus data
        $datadiri->delete();
        // memberikan pesan sudah tersimpan
        return redirect('/tabeldatadiri')->with('status2', 'Data berhasil dihapus');
    }
}
