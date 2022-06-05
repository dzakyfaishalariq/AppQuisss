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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Edit
                            </button>
                            <a href="/hapusdatadiri/{{ $item->id }}" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-primary" id="liveToastBtn">Info</button>
                            <!---<button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Info</button>--->
                        </td>
                    </tr>
                    <!----area ----->
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger text-white">
                            <strong class="me-auto">Data Diri</strong>
                            <small>{{ $item->created_at }}</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <h1>Identitas</h1>
                            <p>Nama : {{$item->nama}}</p>
                            <p>Npm : {{$item->npm}}</p>
                            <p>Semester : {{$item->semester}}</p> 
                            <p>Jurusan : {{$item->jurusan}}</p>
                            <br>
                            <p>Merupakan Perserta Quis yang mendaftar tahun ini pada {{ $item->created_at }}</p>
                        </div>
                        </div>
                    </div>
                    <script>
                        const toastTrigger = document.getElementById('liveToastBtn')
                        const toastLiveExample = document.getElementById('liveToast')
                        if (toastTrigger) {
                            toastTrigger.addEventListener('click', () => {
                                const toast = new bootstrap.Toast(toastLiveExample)
                                toast.show()
                            })
                        }
                    </script>
                    <!----end ------>
                        <form action="/editdatadiri/{{ $item->id }}" method="post">
                            @csrf
                            @method('PUT')
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-5">
                                                    <label for="nama">Nama</label>
                                                    <input value="{{$item->nama}}" type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                                                </div>
                                                <div class="form-group col-5">
                                                    <label for="npm">Npm</label>
                                                    <input value="{{$item->npm}}" type="text" class="form-control" id="npm" name="npm" placeholder="npm" required>
                                                </div>
                                                <div class="form-group col-5">
                                                    <label for="semester">Semester</label>
                                                    <input value="{{$item->semester}}" type="text" class="form-control" id="semester" name="semester" placeholder="semester" required>
                                                </div>
                                                <div class="from-group col-5">
                                                    <label for="jurusan">Jurusan</label>
                                                    <select class="form-control" id="jurusan" name="jurusan" required>
                                                        <option value="{{ $item->jurusan }}">{{ $item->jurusan }}</option>
                                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                                        <option value="Teknik Mesin">Teknik Mesin</option>
                                                        <option value="Teknik Elektro">Teknik Elektro</option>
                                                        <option value="Teknik Sipil">Teknik Sipil</option>
                                                        <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="/isidata" class="btn btn-success">Tambah Data</a>
            <a href="/" class=" btn btn-dark">kembali</a>
        </div>
    </div>
</div>
@endsection