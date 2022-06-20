@extends('layouts.layout')

@section('content')  
    <section class="mt-5 pb-5">
        <div class="container">
            <div class="page-title">
                <h2 class="f-green f-20 f-bold">Rekomendasi Hasil Pencarian</h2>
                <p class="f-black f-16">Menampilkan 10 rekomendasi kost</p>
            </div>
            <div class="list-order mt-5">
                @foreach($kost_rekomendasi as $kost)
                <div class="order mb-4">
                    <a href="/detail/{{$kost->id}}">
                        <div class="ordered d-flex">
                            <img src="/images/kost/{{$kost->gambar}}" style="width: 250px; height:150px; object-fit:cover; border-radius:10px;" alt="">
                            <div class="detail-order flex-grow-1 ms-sm-5 ms-3">
                                <h2 class="f-black f-20 f-bold">{{$kost->nama}}</h2>
                                <p class="f-black">Tersisa {{$kost->jumlah_kamar}} kamar lagi</p>
                                <p class="f-black">Kota {{$kost->kota}}</p>
                                <p class="f-black">Khusus {{$kost->kategori}}</p>
                                <p class="f-grey">
                                    <?php
                                        $fasilitas = "";
                                        
                                        if($kost->is_wifi == "tersedia"){
                                            $fasilitas .= "Wi-Fi, ";
                                        }
    
                                        if($kost->is_ac == "tersedia"){
                                            $fasilitas .= "AC,";
                                        }
    
                                        if($kost->is_toilet == "di dalam"){
                                            $fasilitas .= "Toilet di Dalam,";
                                        }
    
                                        if($kost->is_kasur == "tersedia"){
                                            $fasilitas .= "Kasur,";
                                        }
    
                                        if($kost->is_meja == "tersedia"){
                                            $fasilitas .= "Meja,";
                                        }
    
                                        if($kost->is_lemari == "tersedia"){
                                            $fasilitas .= "Lemari,";
                                        }
    
                                        echo rtrim($fasilitas, ',');
                                            
                                    ?>
                                </p>
                                <p class="f-orange f-semi-bold">Rp.{{$kost->harga}}/Bulan</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection