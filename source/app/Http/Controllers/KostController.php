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

    // View halaman edit kost
    public function editView($id){
        $kost = Kost::findOrFail($id);

        return view("kost.edit", [
            'kost' => $kost,
            "title" => "Edit Kost"
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
        $file->move(public_path('/images/kost/'), $file_name);

        // Jika validasi lolos buat object kost
        $new_kost = new Kost();
        $new_kost->nama = $request['nama']; $new_kost->kota = $request['kota'];
        $new_kost->kategori = $request['kategori']; $new_kost->jumlah_kamar = $request['jumlah_kamar'];
        $new_kost->ukuran = $request['ukuran']; $new_kost->is_wifi = $request['is_wifi'];
        $new_kost->is_ac = $request['is_ac']; $new_kost->is_toilet = $request['is_toilet'];
        $new_kost->is_kasur = $request['is_kasur']; $new_kost->is_meja = $request['is_meja'];
        $new_kost->is_lemari = $request['is_lemari']; $new_kost->deskripsi = $request['deskripsi'];
        $new_kost->alamat = $request['alamat']; $new_kost->harga = $request['harga'];
        $new_kost->gambar = $file_name;

        // Save ke database
        $new_kost->save();

        // redirect ke halaman owner dan beri pesan berhasil
        return redirect("/owner")->with("tambah_kost_berhasil", "Tambah kost berhasil");
    }

    // Fungsi untuk meng-edit kost
    public function edit(Request $request, $id){
        // Validasi input user
        $request->validate([
            "nama"=>"required", "kota"=>"required","kategori"=>"required",
            "jumlah_kamar"=>"required", "ukuran"=>"required","is_wifi"=>"required",
            "is_ac"=>"required", "is_toilet"=>"required","is_kasur"=>"required",
            "is_meja"=>"required", "is_lemari"=>"required","deskripsi"=>"required",
            "alamat"=>"required", "harga"=>"required",
        ]);

        // get data saat ini
        $kost = Kost::findOrFail($id);

        // check gambar baru di upload atau tidak
        if(!($request->hasFile('gambar'))){ 
            // gunakan gambar lama
            $file_name = $kost->gambar;
        }else {
            // Upload gambar baru
            $file = $request->file('gambar');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('/images/kost/'), $file_name); 
        }

        // Jika validasi lolos buat object kost
        $kost->nama = $request['nama']; $kost->kota = $request['kota'];
        $kost->kategori = $request['kategori']; $kost->jumlah_kamar = $request['jumlah_kamar'];
        $kost->ukuran = $request['ukuran']; $kost->is_wifi = $request['is_wifi'];
        $kost->is_ac = $request['is_ac']; $kost->is_toilet = $request['is_toilet'];
        $kost->is_kasur = $request['is_kasur']; $kost->is_meja = $request['is_meja'];
        $kost->is_lemari = $request['is_lemari']; $kost->deskripsi = $request['deskripsi'];
        $kost->alamat = $request['alamat']; $kost->harga = $request['harga'];
        $kost->gambar = $file_name;

        // Save ke database
        $kost->save();

        // redirect ke halaman owner dan beri pesan berhasil
        return redirect("/owner")->with("edit_kost_berhasil", "Edit kost berhasil");
    }


    public function viewDetail($id) {
        $kost = Kost::findOrFail($id);
        return view("kost.detail", [
            "title" => "Detail Kost",
            'kost'=> $kost
        ]);
    }
}
