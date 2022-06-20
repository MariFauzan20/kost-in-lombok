@extends('layouts.layout')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1 class="f-green f-20 f-bold">Hapus Kost</h1>
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
                        <button class="btn btn-danger btn-sm me-3 rounded-btn" style="font-size: 1rem;" data-bs-toggle="modal" data-bs-target="#delete">Hapus Kost</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-btn">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus kost ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary rounded-btn" data-bs-dismiss="modal">Tidak</button>
                <form action="/hapus-kost/{{ $kost->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger rounded-btn">Hapus</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
