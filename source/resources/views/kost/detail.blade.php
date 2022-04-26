@extends('layouts.layout')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1>Detail Kost</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img class="img-thumbnail" src="https://images.unsplash.com/photo-1650274842929-e189318649bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="">
            </div>
            <div class="col ms-4">
                <div class="row">
                    <h2>Kost Ali Babam</h2>
                    <p class="text-secondary my-0">Kota Mataram</p>
                    <p class="my-0">Khusus Pria(tersedia 3 kamar lagi)</p>
                    <p class="fw-bold text-primary">Rp 1.250.000/bulan</p>
                </div>
                <div class="row">
                    <h3>Fasilitas</h3>
                    <ul class="ms-3">
                        <li>Ukuran Kamar        : 2x3 meter</li>
                        <li>Kamar mandi dalam   : Ya</li>
                        <li>Tersedia AC         : Ya</li>
                        <li>Tersedia Wifi       : Ya</li>
                        <li>Tersedia Kasur      : Ya</li>
                    </ul>
                </div>
                 <div class="row">
                    <h3>Deskripsi Tambahan</h3>
                    <p class="text-secondary">Kos ini terletak dekat dengan universitas mataram sekitar 20 jam perjalanan menggunakan pesawat jet. Aturan kos bebas asal tidak mengganggu yang lain. hehee</p>
                </div>
                <div class="row">
                    <div class="col d-flex">
                        <button class="btn btn-primary btn-sm me-3">Hubungi Pemilik</button>
                        <button class="btn btn-outline-success btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
