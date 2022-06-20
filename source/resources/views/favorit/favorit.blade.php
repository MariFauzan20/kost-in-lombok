@extends('layouts.layout')

@section('content')
    @if(session()->has('hapus_favorit_berhasil'))
        <div class="container alert alert-success text-center mt-3" role="alert">
            {{ session('hapus_favorit_berhasil')}}
        </div>
    @endif
    <section class="mt-5 pb-5">
        <div class="container">
            <div class="page-title">
                <h2 class="f-green f-20 f-bold">Wishlist Kost</h2>
            </div>
            <div class="list-items mt-4">
                @if(count($kostan) == 0)
                    <div class="text-center">Belum ada Kost favorit</div>
                @endif
                <div class="row gy-5 row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    @foreach($kostan as $kost)
                    <div class="col">
                        <div class="card">
                            <img src='images/kost/{{$kost->gambar}}' class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{$kost->nama}}</h5>
                                <p class="card-text f-black">{{$kost->kota}}</p>
                                <p class="card-text f-black">{{$kost->kategori}}</p>
                                <p class="card-text f-grey">
                                    <?php
                                        $fasilitas = "";

                                        if($kost->is_wifi == "tersedia"){
                                            $fasilitas .= "Wi-Fi, ";
                                        }

                                        if($kost->is_ac == "tersedia"){
                                            $fasilitas .= "AC, ";
                                        }

                                        if($kost->is_toilet == "di dalam"){
                                            $fasilitas .= "Toilet di Dalam, ";
                                        }

                                        if($kost->is_kasur == "tersedia"){
                                            $fasilitas .= "Kasur, ";
                                        }

                                        if($kost->is_meja == "tersedia"){
                                            $fasilitas .= "Meja, ";
                                        }

                                        if($kost->is_lemari == "tersedia"){
                                            $fasilitas .= "Lemari,";
                                        }

                                        echo rtrim($fasilitas, ',');

                                    ?>
                                </p>
                                <p class="card-price f-orange">Rp.{{$kost->harga}} /Bulan</p>
                            </div>
                            <div class="action d-flex flex-column justify-content-center align-items-center">
                                <a href="detail/{{$kost->id}}" class="btn btn-primary rounded-btn" style="width: 120px;">Lihat</a>
                                <form action="/favorit/hapus/{{$kost->fav_id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger rounded-btn mt-2" style="width: 120px;">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>
</div>
@endsection
