@extends('myTemplate.main')
@section('content')
<br>
<div class=" container">
    <div class=" card">
        <div class="card-header">
            <h3>Hasil anda dalam menjawab kuis</h3>
        </div>
        <div class="card-body">
            <h4>Selamat sudah menyelesaikan Quis ini dengan atas peserta</h4>
            <p>Nama : {{ $nama }}</p>
            <p>Npm : {{ $npm }}</p>
            <p>Semester : {{ $semester }}</p>
            <p>Jurusan : {{ $jurusan }}</p>
            <p>Dengan nilai anda sebesar <b class=" text-danger">{{ $jumlah_nilai }}</b> </p>
            <h2>Status anda</h2>
            <h1>{{ $status }}</h1>
        </div>
        <div class=" card-footer">
            <a href="/" class=" btn btn-dark">kembali</a>
        </div>
    </div>
</div>
@endsection