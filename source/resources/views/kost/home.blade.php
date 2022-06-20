@extends('layouts.layout')

@section('content')
    @if(session()->has('id_user_tidak_sesuai'))
        <div class="container alert alert-danger text-center mt-3" role="alert">
            {{ session('id_user_tidak_sesuai')}}
        </div>
    @endif

    @if(session()->has('not_permit'))
        <div class="container alert alert-danger text-center mt-3" role="alert">
            {{ session('not_permit')}}
        </div>
    @endif

    <section class="welcome py-5">
        <div class="container">
            <div class="welcoming-text">
                <h1 class="f-24 f-black f-bold">Hi {{Auth::user()->username}}, bingung Cari Kost di Lombok?</h1>
                <p class="f-grey">Cari kost di lombok sesuai selera dan dompet kamu.</p>
            </div>
            <div class="input-group search">
                <input id="input-search" type="search" class="form-control rounded" placeholder="Cari kost idaman..." aria-label="Search" aria-describedby="search-addon" data-bs-toggle="modal" data-bs-target="#modal-cari"/>
                <button type="button" class="btn btn-primary"><i class="ri-search-line"></i></button>
            </div>
        </div>
    </section>

    <section class="mt-5 pb-5">
        <div class="container">
            <div class="page-title">
                <h2 class="f-green f-20 f-bold">Terbaru di Lombok.</h2>
            </div>
            <div class="list-items mt-4">
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
                                            $fasilitas .= "Wi-Fi,";
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
                                <p class="card-price f-orange">Rp.{{$kost->harga}} /Bulan</p>
                            </div>
                            <div class="action d-flex justify-content-center align-items-center">
                                <a href="detail/{{$kost->id}}" class="btn btn-primary rounded-btn">Lihat</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>

    <div class="modal fade" id="modal-cari" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/hasil-rekomendasi" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center f-green" id="exampleModalLabel">Cari Kost</h5>
                    </div>
                    <div class="modal-body">
                        <!-- <h2>Masukkan kategori kost sesuai keinginan mu.</h2> -->
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2">

                            <div class="col mb-3">
                                <label for="ukuran" class="form-label">Ukuran kamar</label>
                                <select class="form-select @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" aria-label="Default select example" required>
                                    <option selected value="">Pilih ukuran kamar (m)</option>
                                    <option value="2x3">2x3</option>
                                    <option value="3x3">3x3</option>
                                    <option value="4x3">4x3</option>
                                    <option value="4x4">4x4</option>
                                    <option value="5x4">5x4</option>
                                    <option value="5x5">5x5</option>
                                    <option value="lebih dari 5x5">lebih dari 5x5</option>
                                </select>
                                <div class="invalid-feedback"> @error('ukuran') {{ $message }} @enderror</div>
                            </div>


                            <div class="col mb-3">
                                <label for="is_wifi" class="form-label">Fasilitas Wifi</label>
                                <select class="form-select @error('is_wifi') is-invalid @enderror" id="is_wifi" name="is_wifi" aria-label="Default select example" required>
                                    <option selected value="">Pilih ketersediaan Wifi</option>
                                    <option value="tersedia">Dengan Wifi</option>
                                    <option value="tidak tersedia">Tanpa Wifi</option>
                                </select>
                                <div class="invalid-feedback"> @error('is_wifi') {{ $message }} @enderror</div>
                            </div>

                            <div class="col mb-3">
                                <label for="is_ac" class="form-label">Fasilitas AC</label>
                                <select class="form-select @error('is_ac') is-invalid @enderror" id="is_ac" name="is_ac" aria-label="Default select example" required>
                                    <option selected value="">Pilih ketersediaan AC</option>
                                    <option value="tersedia">Dengan AC</option>
                                    <option value="tidak tersedia">Tanpa AC</option>
                                </select>
                                <div class="invalid-feedback"> @error('is_ac') {{ $message }} @enderror</div>
                            </div>

                            <div class="col mb-3">
                                <label for="is_toilet" class="form-label">Toliet</label>
                                <select class="form-select @error('is_toilet') is-invalid @enderror" id="is_toilet" name="is_toilet" aria-label="Default select example" required>
                                    <option selected value="">Pilih jenis toilet</option>
                                    <option value="di dalam">di Dalam</option>
                                    <option value="di luar">di Luar</option>
                                </select>
                                <div class="invalid-feedback"> @error('is_toilet') {{ $message }} @enderror</div>
                            </div>

                            <div class="col mb-3">
                                <label for="is_kasur" class="form-label">Kasur</label>
                                <select class="form-select @error('is_kasur') is-invalid @enderror" id="is_kasur" name="is_kasur" aria-label="Default select example" required>
                                    <option selected value="">Pilih ketersediaan kasur</option>
                                    <option value="tersedia">Dengan kasur</option>
                                    <option value="tidak tersedia">Tanpa kasur</option>
                                </select>
                                <div class="invalid-feedback"> @error('is_kasur') {{ $message }} @enderror</div>
                            </div>

                            <div class="col mb-3">
                                <label for="is_meja" class="form-label">Meja</label>
                                <select class="form-select @error('is_meja') is-invalid @enderror" id="is_meja" name="is_meja" aria-label="Default select example" required>
                                    <option selected value="">Pilih ketersediaan meja</option>
                                    <option value="tersedia">Dengan meja</option>
                                    <option value="tidak tersedia">Tanpa meja</option>
                                </select>
                                <div class="invalid-feedback"> @error('is_meja') {{ $message }} @enderror</div>
                            </div>

                            <div class="col mb-3">
                                <label for="is_lemari" class="form-label">Lemari</label>
                                <select class="form-select @error('is_lemari') is-invalid @enderror" id="is_lemari" name="is_lemari" aria-label="Default select example" required>
                                    <option selected value="">Pilih ketersediaan lemari</option>
                                    <option value="tersedia">Dengan lemari</option>
                                    <option value="tidak tersedia">Tanpa lemari</option>
                                </select>
                                <div class="invalid-feedback"> @error('is_lemari') {{ $message }} @enderror</div>
                            </div>

                            <div class="col mb-3">
                                <label for="harga" class="form-label">Estimasi harga/Bulan</label>
                                <input type="number" min = "1" name="harga"  class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan harga kost" value="{{ old('harga') }}" required>
                                <div class="invalid-feedback"> @error('harga') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" style="width: 100px;">Cari</button>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" style="width: 100px;">Kembali</button>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection
