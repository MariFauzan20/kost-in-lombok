@extends('layouts.layout')

@section('content')
    @if(session()->has('berhasil_ditambah'))
        <div class="container alert alert-success text-center mt-3" role="alert">
            {{ session('berhasil_ditambah')}}
        </div>
    @endif
    @if(session()->has('sudah_ada'))
        <div class="container alert alert-danger text-center mt-3" role="alert">
            {{ session('sudah_ada')}}
        </div>
    @endif
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1 class="f-green f-20 f-bold">Detail Kost</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <img src="/images/kost/{{$kost->gambar}}" alt="" style="width: 500px; height:500px; object-fit:cover;">
            </div>
            <div class="col ms-4">
                <div class="row">
                    <h2 class="f-bold f-24 f-black">{{$kost->nama}}</h2>
                    <p class="text-secondary my-1">Kota {{$kost->kota}}</p>
                    <p class="my-1">Khusus {{$kost->kategori}} (tersedia {{$kost->jumlah_kamar}} kamar lagi)</p>
                    <p class="f-20 f-orange f-semi-bold">Rp {{$kost->harga}}/bulan</p>
                </div>
                <div class="row mt-3">
                    <h3 class="f-green f-20 f-semi-bold">Fasilitas</h3>
                    <ul class="ms-3">
                        <li class="mt-2">Ukuran Kamar        : {{$kost->ukuran}} meter</li>
                        <li class="mt-2">Kamar mandi : {{$kost->is_toilet}}</li>
                        <li class="mt-2">AC         : {{$kost->is_ac}}</li>
                        <li class="mt-2">Wifi       : {{$kost->is_wifi}}</li>
                        <li class="mt-2">Kasur      : {{$kost->is_kasur}}</li>
                        <li class="mt-2">Meja belajar      : {{$kost->is_meja}}</li>
                        <li class="mt-2">Lemari      : {{$kost->is_lemari}}</li>
                    </ul>
                </div>
                <div class="row mt-4">
                    <h3 class="f-green f-20 f-semi-bold">Deskripsi Tambahan</h3>
                    <p class="f-black">{{$kost->deskripsi}}</p>
                </div>
                <div class="row mt-4">
                    <h3 class="f-green f-20 f-semi-bold">Alamat Lengkap</h3>
                    <p class="f-black">{{$kost->alamat}}</p>
                </div>
                <div class="row mt-3">
                    <div class="col d-flex">
                        <a href="https://wa.me/{{$kost->no_hp}}?text=Permisi%20saya%20tertarik%20dengan%20kostnya%20kak,%20apakah%20masih%20ada%20kamar%20yang%20kosong?" target="_blank" class="btn btn-primary btn-sm me-3 rounded-btn" style="font-size: 1rem; width:200px;">Hubungi Pemilik</a>
                        <form action="/detail/{{$kost->id}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-success btn-sm rounded-btn" style="font-size: 1rem;">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
