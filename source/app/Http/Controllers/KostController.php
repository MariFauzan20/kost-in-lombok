<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;

class KostController extends Controller
{
    // View halaman home(daftar kost)
    public function index(){
        $kost = Kost::all();

        return view("kost.home",[
            "kostan" => $kost,
            "title" => "Home"
        ]);
    }

    // View halaman owner
    public function ownerView(){
        $kost = Kost::all();

        return view("kost.owner", [
            "kostan" => $kost,
            "title" => "Owner"
        ]);
    }

    // View halaman tambah kost
    public function tambahView(){
        return view("kost.tambahKost", [
            "title" => "Tambah Kost"
        ]);
    }


    // Fungsi untuk menambahkan kost
    public function store(Request $request){
        // Validasi input user
        $request->validate([
            "nama"=>"required", "kota"=>"required","kategori"=>"required",
            "jumlah_kamar"=>"required", "ukuran"=>"required","is_wifi"=>"required",
            "is_ac"=>"required", "is_toilet"=>"required","is_kasur"=>"required",
            "is_meja"=>"required", "is_lemari"=>"required","deskripsi"=>"required",
            "alamat"=>"required", "harga"=>"required","gambar"=>"required",
        ]);

        // ambil file gambar
        $file = $request->file('gambar');

        $file_name = $file->getClientOriginalName();

        $file->move(public_path('/images'), $file_name); 

        // Jika validasi lolos buat object kost
        $new_kost = new Kost();

        $new_kost->nama = $request['nama'];

        $new_kost->kota = $request['kota'];

        $new_kost->kategori = $request['kategori'];

        $new_kost->jumlah_kamar = $request['jumlah_kamar'];

        $new_kost->ukuran = $request['ukuran'];

        $new_kost->is_wifi = $request['is_wifi'];

        $new_kost->is_ac = $request['is_ac'];

        $new_kost->is_toilet = $request['is_toilet'];

        $new_kost->is_kasur = $request['is_kasur'];

        $new_kost->is_meja = $request['is_meja'];

        $new_kost->is_lemari = $request['is_lemari'];

        $new_kost->deskripsi = $request['deskripsi'];

        $new_kost->alamat = $request['alamat'];

        $new_kost->harga = $request['harga'];
        
        $new_kost->gambar = $file_name;

        // Save ke database
        $new_kost->save();


        // redirect ke halaman owner dan beri pesan berhasil
        return redirect("/owner")->with("tambah_kost_berhasil", "Tambah kost berhasil");

    }
}
