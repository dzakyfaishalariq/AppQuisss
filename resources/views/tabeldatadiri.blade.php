@extends('myTemplate.main')
@section('content')
<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="card">
        <div class=" card-header text-center bg-danger">
            <h3 class=" text-warning">Data Diri Perserta</h3>
        </div>
        <div class="card-body">
            <table class=" table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Npm</th>
                        <th>Semester</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->npm}}</td>
                        <td>{{$item->semester}}</td>
                        <td>{{$item->jurusan}}</td>
                        <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="/isidata" class="btn btn-success">Tambah Data</a>
            <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Info</button>
            <a href="/" class=" btn btn-dark">kembali</a>
        </div>

        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasTopLabel">INFO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, molestias nulla voluptate, sed mollitia blanditiis debitis distinctio quam laborum sapiente at porro minus enim natus sint possimus quas est perspiciatis?</p>
            </div>
        </div>
    </div>
</div>
@endsection