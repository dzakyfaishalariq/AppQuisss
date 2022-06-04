@extends('myTemplate.main')
@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>VALIDASI</h3>
        </div>
        <div class=" card-body">
            <form action="/validasitoken" method="post">
                @csrf
                <div class="col-12"> 
                    <div class=" form-control">
                        <label for="nama" class=" text-success">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-control">
                        <label for="npm" class=" text-success">Npm</label>
                        <input type="text" class="form-control" id="npm" name="npm" placeholder="npm" required>
                    </div>
                </div>
                <hr>
                <button type="submit" class=" btn btn-secondary">Mulai Tess</button>
            </form>
        </div>
    </div>
</div>
@endsection