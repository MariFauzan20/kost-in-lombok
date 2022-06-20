<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kost;
use Illuminate\Support\Facades\Auth;

class KostController extends Controller
{
    // View halaman home(daftar kost)
    public function homeView(){
        
        // Cek role user 
        if(Auth::user()->is_owner == 1){
            return redirect('/owner');
        }


        $kost = Kost::all();
        return view("kost.home",[
            "kostan" => $kost,
            "title" => "Home"
        ]);
    }

    // Fungsi Halaman detail Kost
    public function detailView($id) {

        $kost = Kost::findOrFail($id);
        return view("kost.detail", [
            "title" => "Detail Kost",
            'kost'=> $kost
        ]);
    }

    // View halaman owner
    public function ownerView(){
        // cek role user 
        if(Auth::user()->is_owner == 0){
            return redirect('/')->with('not_permit', 'Anda bukan seorang pemilik kost');
        }

        $user_id = Auth::user()->id;

        $kost = DB::select(
            "Select kost.* from kost, users where users.id = kost.user_id and kost.user_id = $user_id"
        );

        return view("kost.owner", [
            "kostan" => $kost,
            "title" => "Owner"
        ]);
    }

    // View halaman tambah kost
    public function tambahView(){
        // cek role user
        if(Auth::user()->is_owner == 0){
            return redirect('/')->with('not_permit', 'Anda bukan seorang pemilik kost');
        }

        return view("kost.tambahKost", [
            "title" => "Tambah Kost"
        ]);
    }

    // View halaman edit kost
    public function editView($id){
        // cek role user
        if(Auth::user()->is_owner == 0){
            return redirect('/')->with('not_permit', 'Anda bukan seorang pemilik kost');
        }

        // validasi id user yang sesuai dengan kost yang dimiliki
        $kost = Kost::findOrFail($id);
        if(Auth::user()->id != $kost->user_id){
            return redirect("/owner")->with("bukan_kost_anda", "Kepemilikan kost tidak sesuai");
        }else {
            return view("kost.edit", [
                'kost' => $kost,
                "title" => "Edit Kost"
            ]);
        }
    }

    // View halaman edit kost
    public function hapusView($id){
        // cek role user
        if(Auth::user()->is_owner == 0){
            return redirect('/')->with('not_permit', 'Anda bukan seorang pemilik kost');
        }

        $kost = Kost::findOrFail($id);
        return view("kost.hapus", [
            'kost' => $kost,
            'title' => 'Hapus Kost',
        ]);
    }


    // Fungsi untuk menambahkan kost
    public function tambahKost(Request $request){
        // Validasi input user
        $request->validate([
            "nama"=>"required", "kota"=>"required","kategori"=>"required",
            "jumlah_kamar"=>"required", "ukuran"=>"required","is_wifi"=>"required",
            "is_ac"=>"required", "is_toilet"=>"required","is_kasur"=>"required",
            "is_meja"=>"required", "is_lemari"=>"required","deskripsi"=>"required",
            "alamat"=>"required", "harga"=>"required","gambar"=>"required", "no_hp" => "required"
        ]);

        // ambil file gambar
        $file = $request->file('gambar');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('/images/kost/'), $file_name);

        // Jika validasi lolos buat object kost
        $new_kost = new Kost();
        $new_kost->user_id = Auth::user()->id;
        $new_kost->nama = $request['nama']; $new_kost->kota = $request['kota'];
        $new_kost->kategori = $request['kategori']; $new_kost->jumlah_kamar = $request['jumlah_kamar'];
        $new_kost->ukuran = $request['ukuran']; $new_kost->is_wifi = $request['is_wifi'];
        $new_kost->is_ac = $request['is_ac']; $new_kost->is_toilet = $request['is_toilet'];
        $new_kost->is_kasur = $request['is_kasur']; $new_kost->is_meja = $request['is_meja'];
        $new_kost->is_lemari = $request['is_lemari']; $new_kost->deskripsi = $request['deskripsi'];
        $new_kost->alamat = $request['alamat']; $new_kost->harga = $request['harga'];
        $new_kost->gambar = $file_name; $new_kost->no_hp = $request['no_hp'];

        // Save ke database
        $new_kost->save();

        // redirect ke halaman owner dan beri pesan berhasil
        return redirect("/owner")->with("tambah_kost_berhasil", "Tambah kost berhasil");
    }

    // Fungsi untuk meng-edit kost
    public function editKost(Request $request, $id){
        // Validasi input user
        $request->validate([
            "nama"=>"required", "kota"=>"required","kategori"=>"required",
            "jumlah_kamar"=>"required", "ukuran"=>"required","is_wifi"=>"required",
            "is_ac"=>"required", "is_toilet"=>"required","is_kasur"=>"required",
            "is_meja"=>"required", "is_lemari"=>"required","deskripsi"=>"required",
            "alamat"=>"required", "harga"=>"required", "no_hp" => "required"
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
        $kost->gambar = $file_name; $kost->no_hp = $request['no_hp'];

        // Save ke database
        $kost->save();

        // redirect ke halaman owner dan beri pesan berhasil
        return redirect("/owner")->with("edit_kost_berhasil", "Edit kost berhasil");
    }

    // Fungsi Hapus kost
    public function hapusKost($id){
        // cari kost yang ingin dihapus
        $kost = Kost::findOrFail($id);

        // hapus marchendise
        $kost->delete();

        return redirect('/owner')->with('hapus-success', 'Kost berhasil dihapus');
    }
}
