@extends('myTemplate.main')
@section('content')
<br>
<div class="container">
    <div class="card">
        <div class=" card-header">
            <h3>Lembar Soal</h3>
        </div>
        <div class="card-body">
            <h4>Identitas</h4>
            <p>Nama : {{ $data->nama }}</p>
            <p>Npm : {{ $data->npm }}</p>
            <p>Semester : {{ $data->semester }}</p>
            <p>Jurusan : {{ $data->jurusan }}</p>
            <hr>
            <form action="/kelolajawaban" method="post">
                @csrf
                <div class="row">
                    @foreach($data_soal as $s)
                    <div class="col-6">
                        <div class="card">
                            <h6>{{ $s->soal }}</h6>
                            <hr>
                            <!----membuat pilihan radio button--->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jaw{{$loop->iteration}}" id="soal{{ $s->id }}" value="{{ $s->pil1 }}" required>
                                <label class="form-check-label" for="soal{{ $s->id }}">
                                    {{ $s->pil1 }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jaw{{$loop->iteration}}" id="soal{{ $s->id }}" value="{{ $s->pil2 }}" required>
                                <label class="form-check-label" for="soal{{ $s->id }}">
                                    {{ $s->pil2 }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jaw{{$loop->iteration}}" id="soal{{ $s->id }}" value="{{ $s->pil3 }}" required>
                                <label class="form-check-label" for="soal{{ $s->id }}">
                                    {{ $s->pil3 }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jaw{{$loop->iteration}}" id="soal{{ $s->id }}" value="{{ $s->pil4 }}" required>
                                <label class="form-check-label" for="soal{{ $s->id }}">
                                    {{ $s->pil4 }}
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <input type="hidden" name="nama" value="{{ $data->nama }}">
                <input type="hidden" name="npm" value="{{ $data->npm }}">
                <input type="hidden" name="semester" value="{{ $data->semester }}">
                <input type="hidden" name="jurusan" value="{{ $data->jurusan }}">
                <button type="submit" class="btn btn-primary">Selesai</button>
                <a href="/" class=" btn btn-primary">Batalkan quis</a>
            </form>
        </div>
    </div>
</div>
@endsection