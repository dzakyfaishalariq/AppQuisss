@extends('myTemplate.main')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center bg-info">
                    <h3>Pilih menu</h3>
                </div>
                <div class="card-body">
                    <div class=" row">
                        <div class=" col-3">
                            <div class="card border-danger">
                                <div class="card-header text-center bg-warning">
                                    <h4>Menu</h4>
                                </div>
                                <div class="card-body">
                                    <a href="/isidata" class=" btn btn-success ">Isi Data anda sebelum melaksanakan ujian</a>
                                    <hr>
                                    <a href="/quis" class=" btn btn-primary ">Mulai quis sebagai bahan pembelajaran</a>
                                    <hr>
                                    <a href="/tabeldatadiri" class=" btn btn-info">Lihat data diri semua orang yang mengikuti kuis</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="card border-dark">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sint tenetur corporis odit pariatur voluptas, aliquam voluptatem odio aspernatur quasi, architecto non velit accusamus quia sed recusandae debitis quis maxime.</p>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad adipisci veniam recusandae alias voluptates, numquam dolores commodi autem totam voluptatum nemo fuga. Accusantium, placeat repudiandae tenetur dolorum commodi cum totam?</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur ipsum ab nisi temporibus rerum, voluptatibus, inventore voluptates nobis eligendi suscipit deserunt tempora. Obcaecati blanditiis eaque nemo eveniet, dolorem iure doloremque!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection