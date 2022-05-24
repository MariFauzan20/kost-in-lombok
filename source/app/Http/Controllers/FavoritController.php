<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Favorit;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{
    public function favoritView(){
        // ambil id user
        $user_id = Auth::user()->id;

        $allKostInFavorit =  DB::select(
            "Select kost.*, favorit.id as fav_id from kost, users, favorit where favorit.user_id = $user_id and favorit.kost_id = kost.id and favorit.user_id = users.id"
        );   
        
        return view("favorit.favorit",[
            "kostan" => $allKostInFavorit,
            "title" => "Kost Favorit"
        ]);
    }

    public function addFavorit($id){
        // ambil id kost
        $kost_id = $id;

        // ambil id user
        $user_id = Auth::user()->id;

        // Cek apakah kost sudah ditambahkan atau belum oleh user
        $kost_favorit = DB::select("select id from favorit where user_id = $user_id and kost_id = $kost_id");

        if($kost_favorit == true){
            // jika kost sudah ada di favorit kembalikan ke halaman detail dan beri pesan
            return redirect("/detail/$kost_id")->with('sudah_ada', "Kost sudah ada di favorit");
        }else{
            //  jika kost belum ada di favorit, insert-kan kost menjadi favorit

            // Buat object favorit
            $new_fav = new Favorit();

            $new_fav->user_id = $user_id;
            $new_fav->kost_id = $kost_id;

            // insert ke database (save)
            $new_fav->save();

            return redirect("/detail/$id")->with('berhasil_ditambah', "Kost berhasil ditambahakan ke favorit");
        }  
    }

     // fungsi hapus kost dari favorit($id --> id favorit)
     public function deleteFavorit($id){
        // ambil id favorit
        $id_favorit = $id;

        // cari kost favorit yang ingin dihapus
        $fav = Favorit::findOrFail($id_favorit);

        // hapus kost
        $fav->delete();

        return redirect("/favorit")->with('hapus_favorit_berhasil', 'Kost dihapus dari Wishlist');
    }
}
