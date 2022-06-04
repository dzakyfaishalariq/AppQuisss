@extends('myTemplate.main')
@section('content')
<br>
    <div class="container">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <div class=" card">
            <div class=" card-header bg-danger">
                <h3>Silahkan isi data anda!</h3>
            </div>
            <div class=" card-body">
                <form action="/tambahdatadiri" method="post">
                    @csrf
                    <div class=" row">
                        <div class="form-group col-5">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group col-5">
                            <label for="npm">Npm</label>
                            <input type="text" class="form-control" id="npm" name="npm" placeholder="npm" required>
                        </div>
                        <div class="form-group col-5">
                            <label for="semester">Semester</label>
                            <input type="text" class="form-control" id="semester" name="semester" placeholder="semester" required>
                        </div>
                        <div class="from-group col-5">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class=" form-group">
                        <button type="submit" class=" btn btn-success">Simpan</button>
                        <a href="/" class=" btn btn-dark">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection