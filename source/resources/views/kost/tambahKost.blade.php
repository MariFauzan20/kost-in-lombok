@extends('layouts.layout')

@section('content')  
  <div class="container mt-5">
      <h2 class="f-green f-20 f-bold">Tambah Kost</h2>
      <!-- <div class="card">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/No-image-available.png" class="card-img-top" alt="preview-gambar">
        <div class="card-body">
            <h5 class="card-title">Preview Nama</h5>
            <p class="card-text">Preview Jenis</p>
            <p class="card-price">Preview Harga</p>
        </div>
      </div> -->
      <form action="/tambah-kost" method="POST" class="mt-4 w-75" enctype="multipart/form-data">
          @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kost</label>
            <input type="text" name="nama"  class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama kost" value="{{ old('nama') }}">
            <div class="invalid-feedback"> @error('nama') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <select class="form-select @error('kota') is-invalid @enderror" id="kota" name="kota" aria-label="Default select example">
                <option selected value="">Pilih kota tempat Kost</option>
                <option value="Mataram">Mataram</option>
                <option value="Narmada">Narmada</option>
                <option value="Praya">Praya</option>
                <option value="Pancor">Pancor</option>
                <option value="Mandalika">Mandalika</option>
                <option value="Gunung Sari">Gunung Sari</option>
            </select>
            <div class="invalid-feedback"> @error('kota') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" aria-label="Default select example">
                <option selected value="">Pilih kategori</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
            <div class="invalid-feedback"> @error('kategori') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="jumlah_kamar" class="form-label">Jumlah kamar tersedia</label>
            <select class="form-select @error('jumlah_kamar') is-invalid @enderror" id="jumlah_kamar" name="jumlah_kamar" aria-label="Default select example">
                <option selected value="">Pilih jumlah kamar tersedia</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="lebih dari 5">lebih dari 5</option>
            </select>
            <div class="invalid-feedback"> @error('jumlah_kamar') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran kamar</label>
            <select class="form-select @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" aria-label="Default select example">
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
        <div class="mb-3">
            <label for="is_wifi" class="form-label">Fasilitas Wifi</label>
            <select class="form-select @error('is_wifi') is-invalid @enderror" id="is_wifi" name="is_wifi" aria-label="Default select example">
                <option selected value="">Pilih ketersediaan Wifi</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_wifi') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_ac" class="form-label">Fasilitas AC</label>
            <select class="form-select @error('is_ac') is-invalid @enderror" id="is_ac" name="is_ac" aria-label="Default select example">
                <option selected value="">Pilih ketersediaan AC</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_ac') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_toilet" class="form-label">Toliet</label>
            <select class="form-select @error('is_toilet') is-invalid @enderror" id="is_toilet" name="is_toilet" aria-label="Default select example">
                <option selected value="">Pilih jenis toilet</option>
                <option value="di dalam">di Dalam</option>
                <option value="di luar">di Luar</option>
            </select>
            <div class="invalid-feedback"> @error('is_toilet') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_kasur" class="form-label">Kasur</label>
            <select class="form-select @error('is_kasur') is-invalid @enderror" id="is_kasur" name="is_kasur" aria-label="Default select example">
                <option selected value="">Pilih ketersediaan kasur</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_kasur') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="is_meja" class="form-label">Meja</label>
            <select class="form-select @error('is_meja') is-invalid @enderror" id="is_meja" name="is_meja" aria-label="Default select example">
                <option selected value="">Pilih ketersediaan meja</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_meja') {{ $message }} @enderror</div>
        </div>
     
        <div class="mb-3">
            <label for="is_lemari" class="form-label">Lemari</label>
            <select class="form-select @error('is_lemari') is-invalid @enderror" id="is_lemari" name="is_lemari" aria-label="Default select example">
                <option selected value="">Pilih ketersediaan lemari</option>
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
            <div class="invalid-feedback"> @error('is_lemari') {{ $message }} @enderror</div>
        </div>

        
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Tambahan</label>
            <textarea type="text" name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan deskripsi tambahan/fasilitas lainnya">{{old('deskripsi') }}</textarea>
            <div class="invalid-feedback"> @error('deskripsi') {{ $message }} @enderror</div>
        </div>    
        
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea type="text" name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat lengkap dari Kost">{{old('alamat') }}</textarea>
            <div class="invalid-feedback"> @error('alamat') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Kost</label>
            <input type="number" min = "1" name="harga"  class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan harga kost" value="{{ old('harga') }}">
            <div class="invalid-feedback"> @error('harga') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label" for="gambar">Pilih Gambar</label>
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" accept="image/*" >
            <div class="invalid-feedback"> @error('gambar') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No Handphone (Whatsapp)</label>
            <input type="text" name="no_hp"  class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan no HP yang bisa dihubungi" value="{{ old('no_hp') }}">
            <div class="invalid-feedback"> @error('no_hp') {{ $message }} @enderror</div>
        </div>
        
        <div class="buttons mt-4">
            <button type="submit" class="btn btn-primary rounded-btn">Tambah</button>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-btn">Kembali</a>
            <div class="invalid-feedback"> @error('') {{ $message }} @enderror</div>
        </div>


      </form>
    </div>
  @endsection

