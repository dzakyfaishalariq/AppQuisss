<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\datadiri;

class soalController extends Controller
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
        $soal = new Soal;
        $soal->soal = $request->soal;
        $soal->pil1 = $request->pil_a;
        $soal->pil2 = $request->pil_b;
        $soal->pil3 = $request->pil_c;
        $soal->pil4 = $request->pil_d;
        $soal->jawaban = $request->jawaban;
        //simpan data
        $soal->save();
        // memberikan pesan sudah tersimpan
        return redirect('/buatSoal')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
        //ubah data
        $soal->soal = $request->soal;
        $soal->pil1 = $request->pil_a;
        $soal->pil2 = $request->pil_b;
        $soal->pil3 = $request->pil_c;
        $soal->pil4 = $request->pil_d;
        $soal->jawaban = $request->jawaban;
        //simpan data
        $soal->save();
        // memberikan pesan sudah tersimpan
        return redirect('/buatSoal')->with('status2', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        //
    }
    public function area_quis(Request $request)
    {
        $soal = Soal::all();
        //kelola jawaban
        //$mysoal = Soal::all();
        //mengambil data pertama
        //$soal1 = $mysoal->first();
        //$myjawaban = new jawaban;
        $array = $request->all();
        //catatan :
        //$myjawaban->jawaban = $request->jawaban;
        //$myData = $request->mydata;
        //if ($request->jawaban == $soal1->jawaban) {
        //    $myjawaban->point = 20;
        //} else {
        //    $myjawaban->point = 0;
        //}
        //simpan data
        //$myjawaban->save();
        // mengambil semua data request
        //$data = $request->all();
        //menampilkan data request
        //dd($data);
        // mengambil key di data request
        //$key = array_keys($array);
        // mengubah key menjadi string
        //$key2 = implode(',', $key);
        // mengambil value di data request
        //$value = array_values($array);
        //mengambil array pertama di request
        //$data1 = $request->all()['jaw1'];
        //menampilkan data pertama di request berbentuk string
        //===============================
        $nama = $request->nama;
        $npm = $request->npm;
        $semester = $request->semester;
        $jurusan = $request->jurusan;
        $jumlah_nilai = 0;
        $index = 1;
        $data_soal = Soal::all();
        foreach ($data_soal as $soal) {
            if ($request->{'jaw' . $index} == $soal->jawaban) {
                $jumlah_nilai += 10;
            } else {
                $jumlah_nilai -= 2;
            }
            $index++;
        }
        // rata rata nilai
        //banyak data soal
        $banyak_soal = Soal::count();
        $rata_rata = $jumlah_nilai / $banyak_soal;
        if ($rata_rata >= 9) {
            $status = "A";
        } elseif ($rata_rata >= 8) {
            $status = "B";
        } elseif ($rata_rata >= 7) {
            $status = "C";
        } elseif ($rata_rata >= 6) {
            $status = "D";
        } else {
            $status = "E";
        }
        $title = 'Hasil Quis';
        return view('hasilTess', compact('jumlah_nilai', 'title', 'nama', 'npm', 'semester', 'jurusan', 'status'));
    }
    public function delete(Soal $soal)
    {
        //hapus data
        $soal->delete();
        // memberikan pesan sudah tersimpan
        return redirect('/buatSoal')->with('status3', 'Data berhasil dihapus');
    }
}
