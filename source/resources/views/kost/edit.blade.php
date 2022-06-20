@extends('layouts.layout')

@section('content')  
  <div class="container mt-5">
      <h2 class="f-green f-20 f-bold">Edit Kost</h2>
      <div class="preview-image">
          <img src="/images/kost/{{$kost->gambar}}" alt="">
      </div>
      <form action="/edit/{{$kost->id}}" method="POST" class="mt-4 w-75" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kost</label>
            <input type="text" name="nama"  class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama kost" value="{{ $kost->nama }}">
            <div class="invalid-feedback"> @error('nama') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <select class="form-select @error('kota') is-invalid @enderror" id="kota" name="kota" aria-label="Default select example">
                <option value="">Pilih kota tempat Kost</option>
                <option value="Mataram" "@if(($kost->kota) === 'Mataram') {{ 'selected' }} @endif" >Mataram</option>
                <option value="Narmada" "@if(($kost->kota) === 'Narmada') {{ 'selected' }} @endif" >Narmada</option>
                <option value="Praya" "@if(($kost->kota) === 'Praya') {{ 'selected' }} @endif" >Praya</option>
                <option value="Pancor" "@if(($kost->kota) === 'Pancor') {{ 'selected' }} @endif" >Pancor</option>
                <option value="Mandalika" "@if(($kost->kota) === 'Mandalika') {{ 'selected' }} @endif" >Mandalika</option>
                <option value="Gunung Sari" "@if(($kost->kota) === 'Gunung Sari') {{ 'selected' }} @endif" >Gunung Sari</option>
            </select>
            <div class="invalid-feedback"> @error('kota') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" aria-label="Default select example">
                <option value="">Pilih kategori</option>
                <option value="Pria" "@if(($kost->kategori) === 'Pria') {{ 'selected' }} @endif">Pria</option>
                <option value="Wanita" "@if(($kost->kategori) === 'Wanita') {{ 'selected' }} @endif">Wanita</option>
            </select>
            <div class="invalid-feedback"> @error('kategori') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="jumlah_kamar" class="form-label">Jumlah kamar tersedia</label>
            <select class="form-select @error('jumlah_kamar') is-invalid @enderror" id="jumlah_kamar" name="jumlah_kamar" aria-label="Default select example">
                <option value="">Pilih jumlah kamar tersedia</option>
                <option value="1" "@if(($kost->jumlah_kamar) === '1') {{ 'selected' }} @endif">1</option>
                <option value="2" "@if(($kost->jumlah_kamar) === '2') {{ 'selected' }} @endif">2</option>
                <option value="3" "@if(($kost->jumlah_kamar) === '3') {{ 'selected' }} @endif">3</option>
                <option value="4" "@if(($kost->jumlah_kamar) === '4') {{ 'selected' }} @endif">4</option>
                <option value="5" "@if(($kost->jumlah_kamar) === '5') {{ 'selected' }} @endif">5</option>
                <option value="lebih dari 5" "@if(($kost->jumlah_kamar) === 'lebih dari 5') {{ 'selected' }} @endif">lebih dari 5</option>
                <option value="kamar penuh" "@if(($kost->jumlah_kamar) === 'kamar penuh') {{ 'selected' }} @endif">Kamar penuh</option>
            </select>
            <div class="invalid-feedback"> @error('jumlah_kamar') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran kamar</label>
            <select class="form-select @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" aria-label="Default select example">
                <option value="">Pilih ukuran kamar (m)</option>
                <option value="2x3" "@if(($kost->ukuran) === '2x3') {{ 'selected' }} @endif">2x3</option>
                <option value="3x3" "@if(($kost->ukuran) === '3x3') {{ 'selected' }} @endif">3x3</option>
                <option value="4x3" "@if(($kost->ukuran) === '4x3') {{ 'selected' }} @endif">4x3</option>
                <option value="4x4" "@if(($kost->ukuran) === '4x4') {{ 'selected' }} @endif">4x4</option>
                <option value="5x4" "@if(($kost->ukuran) === '5x4') {{ 'selected' }} @endif">5x4</option>
                <option value="5x5" "@if(($kost->ukuran) === '5x5') {{ 'selected' }} @endif">5x5</option>
                <option value="lebih dari 5x5" "@if(($kost->ukuran) === 'lebih dari 5x5') {{ 'selected' }} @endif">lebih dari 5x5</option>
            </select>
            <div class="invalid-feedback"> @error('ukuran') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="is_wifi" class="form-label">Fasilitas Wifi</label>
            <select class="form-select @error('is_wifi') is-invalid @enderror" id="is_wifi" name="is_wifi" aria-label="Default select example">
                <option value="">Pilih ketersediaan Wifi</option>
                <option value="tersedia" "@if(($kost->is_wifi) === 'tersedia') {{ 'selected' }} @endif">Tersedia</option>
                <option value="tidak tersedia" "@if(($kost->is_wifi) === 'tidak tersedia') {{ 'selected' }} @endif">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_wifi') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_ac" class="form-label">Fasilitas AC</label>
            <select class="form-select @error('is_ac') is-invalid @enderror" id="is_ac" name="is_ac" aria-label="Default select example">
                <option value="">Pilih ketersediaan AC</option>
                <option value="tersedia" "@if(($kost->is_ac) === 'tersedia') {{ 'selected' }} @endif">Tersedia</option>
                <option value="tidak tersedia" "@if(($kost->is_ac) === 'tidak tersedia') {{ 'selected' }} @endif">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_ac') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_toilet" class="form-label">Toliet</label>
            <select class="form-select @error('is_toilet') is-invalid @enderror" id="is_toilet" name="is_toilet" aria-label="Default select example">
                <option value="">Pilih jenis toilet</option>
                <option value="di dalam" "@if(($kost->is_toilet) === 'di dalam') {{ 'selected' }} @endif">di Dalam</option>
                <option value="di luar" "@if(($kost->is_toilet) === 'di luar') {{ 'selected' }} @endif">di Luar</option>
            </select>
            <div class="invalid-feedback"> @error('is_toilet') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_kasur" class="form-label">Kasur</label>
            <select class="form-select @error('is_kasur') is-invalid @enderror" id="is_kasur" name="is_kasur" aria-label="Default select example">
                <option value="">Pilih ketersediaan kasur</option>
                <option value="tersedia" "@if(($kost->is_kasur) === 'tersedia') {{ 'selected' }} @endif">Tersedia</option>
                <option value="tidak tersedia" "@if(($kost->is_kasur) === 'tidak tersedia') {{ 'selected' }} @endif">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_kasur') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_meja" class="form-label">Meja</label>
            <select class="form-select @error('is_meja') is-invalid @enderror" id="is_meja" name="is_meja" aria-label="Default select example">
                <option value="">Pilih ketersediaan meja</option>
                <option value="tersedia" "@if(($kost->is_meja) === 'tersedia') {{ 'selected' }} @endif">Tersedia</option>
                <option value="tidak tersedia" "@if(($kost->is_meja) === 'tidak tersedia') {{ 'selected' }} @endif">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_meja') {{ $message }} @enderror</div>
        </div>
     
        <div class="mb-3">
            <label for="is_lemari" class="form-label">Lemari</label>
            <select class="form-select @error('is_lemari') is-invalid @enderror" id="is_lemari" name="is_lemari" aria-label="Default select example">
                <option value="">Pilih ketersediaan lemari</option>
                <option value="tersedia" "@if(($kost->is_lemari) === 'tersedia') {{ 'selected' }} @endif">Tersedia</option>
                <option value="tidak tersedia" "@if(($kost->is_lemari) === 'tidak tersedia') {{ 'selected' }} @endif">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_lemari') {{ $message }} @enderror</div>
        </div>

        
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Tambahan</label>
            <textarea type="text" name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan deskripsi tambahan/fasilitas lainnya">{{$kost->deskripsi }}</textarea>
            <div class="invalid-feedback"> @error('deskripsi') {{ $message }} @enderror</div>
        </div>    
        
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea type="text" name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat lengkap dari Kost">{{$kost->alamat}}</textarea>
            <div class="invalid-feedback"> @error('alamat') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Kost</label>
            <input type="number" min = "1" name="harga"  class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan harga kost" value="{{ $kost->harga }}">
            <div class="invalid-feedback"> @error('harga') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label" for="gambar">Pilih Gambar</label>
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" accept="image/*" >
            <div class="invalid-feedback"> @error('gambar') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No Handphone (Whatsapp)</label>
            <input type="text" name="no_hp"  class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan no HP yang bisa dihubungi" value="{{ $kost->no_hp }}">
            <div class="invalid-feedback"> @error('no_hp') {{ $message }} @enderror</div>
        </div>
        

        <div class="buttons mt-4">
            <button type="submit" class="btn btn-primary rounded-btn">Edit</button>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-btn">Kembali</a>
            <div class="invalid-feedback"> @error('') {{ $message }} @enderror</div>
        </div>

      </form>
    </div>
  @endsection

