@extends('myTemplate.main')
@section('content')
<br>
<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        <span class="material-symbols-outlined">
            done
        </span>
        {{session('status')}}
    </div>
    @endif
    @if(session('status3'))
    <div class="alert alert-danger">
        <span class="material-symbols-outlined">
            error
        </span>
        {{session('status3')}}
    </div>
    @endif
    @if(session('status2'))
    <!--- membuat icon alert succes --->
    <div class="alert alert-success">
        <span class="material-symbols-outlined">
            done
        </span>
        {{session('status2')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header text-center">
            <h3>Pembuatan Soal Admin</h3>
        </div>
        <div class="card-body">
            <form action="/tambahsoal" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="soal" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                            <label for="floatingTextarea2">Tulis Soal di sini!</label>
                        </div>
                    </div>
                    <br>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pi1">Pilihan A</label>
                            <input type="text" class="form-control" name="pil_a" id="pi1" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pi2">Pilihan B</label>
                            <input type="text" class="form-control" name="pil_b" id="pi2" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pi3">Pilihan C</label>
                            <input type="text" class="form-control" name="pil_c" id="pi3" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pi4">Pilihan D</label>
                            <input type="text" class="form-control" name="pil_d" id="pi4" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="jawaban">Jawaban</label>
                            <input type="text" class=" form-control" name="jawaban" id = "jawaban" required>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class=" btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <table class=" table table-dark table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Pilihan D</th>
                    <th>Jawaban</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $s)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->soal}}</td>
                        <td>{{$s->pil1}}</td>
                        <td>{{$s->pil2}}</td>
                        <td>{{$s->pil3}}</td>
                        <td>{{$s->pil4}}</td>
                        <td>{{$s->jawaban}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Edit
                            </button>
                            <a href="/hapussoal/{{ $s->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Soal dan Jawaban</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/editsoal/{{ $s->id }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea name="soal" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"  required>{{ $s->soal }}</textarea>
                                                        <label for="floatingTextarea2">Tulis Soal di sini!</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="pi1">Pilihan A</label>
                                                        <input type="text" class="form-control" name="pil_a" value="{{$s->pil1}}" id="pi1" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="pi2">Pilihan B</label>
                                                        <input type="text" class="form-control" name="pil_b" value="{{$s->pil2}}" id="pi2" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="pi3">Pilihan C</label>
                                                        <input type="text" class="form-control" name="pil_c" value="{{$s->pil3}}" id="pi3" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="pi4">Pilihan D</label>
                                                        <input type="text" class="form-control" name="pil_d" value="{{$s->pil4}}" id="pi4" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="jawaban">Jawaban</label>
                                                        <input type="text" class=" form-control" name="jawaban" value="{{$s->jawaban}}" id = "jawaban" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr> 
    <a href="/" class=" btn btn-success">kembali</a>   
</div>
@endsection