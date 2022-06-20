<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kost;
use App\KNN\KNN;

class RekomendasiController extends Controller
{
    // fungsi view halaman rekomendasi
    public function rekomendasiView(){
        $kostan = Kost::All();
        
        return view("kost.rekomendasi", [
            "title" => "Hasil Rekomendasi",
            "kostan" => $kostan
        ]);
    }

    // Fungsi Cari Kost
    public function cariKost(Request $request){

        // Ambil input user sebagai array
        $arr_input = [
            [
                "id"=>0,"ukuran"=>$request->ukuran, "wifi"=>$request->is_wifi,
                "toilet"=>$request->is_toilet,"kasur"=>$request->is_kasur,
                "meja"=>$request->is_meja,"lemari"=>$request->is_lemari,
                "harga"=>$request->harga,"jarak"=> 0
            ]
        ];

        // ambil data kost dari database sebagai array
        $arr_kost = [];

        foreach(Kost::all() as $kost){
            $to_append = [
                "id"=>$kost->id, "ukuran"=>$kost->ukuran, "wifi"=>$kost->is_wifi,
                "toilet"=>$kost->is_toilet,"kasur"=>$kost->is_kasur,
                "meja"=>$kost->is_meja,"lemari"=>$kost->is_lemari,
                "harga"=>$kost->harga,"jarak"=> 0
            ];
            array_push($arr_kost,$to_append);
        }

        $knn = new KNN();

        // Preporcessing data input
        $input_data_clean = $knn->preprocessingData($arr_input);

        // Preprocessing data kost
        $kost_data_clean = $knn->preprocessingData($arr_kost);

        // Hitung jarak input dengan data kost dengan KNN (ambil 10 jarak terdekat)
        $knn_result = $knn->computeKNN($input_data_clean,$kost_data_clean, 10);

        // ambil id yang sudah terurut berdasarkan perhitungan KNN
        $id_sorted = array_column($knn_result,'id');
        $id_sorted = implode(",", $id_sorted);

        // query data hasil rekomendasi berdasarkan id 
        $kost_rekomendasi = DB::select(
            "SELECT * FROM kost WHERE id IN ($id_sorted) ORDER BY FIELD(id,$id_sorted);"
        );

        return view("kost.rekomendasi",[
            'title'=> "Rekomendasi Kost", 
            'kost_rekomendasi'=> $kost_rekomendasi
        ]);

    }
}
