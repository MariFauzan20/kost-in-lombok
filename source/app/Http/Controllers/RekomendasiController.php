<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kost;

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

    // Fungsi Preprocessing Data
    public function preprocessing($data){
        $res = $data;
        
        // Pelabelan data tiap kolom
        for ($i=0; $i < count($data) ; $i++) { 
            // Pelabelan kolom "ukuran"
            if($data[$i]["ukuran"] == "2x3") {
                $res[$i]["ukuran"] = 1;
            }else if($data[$i]["ukuran"] == "3x3"){
                $res[$i]["ukuran"] = 2;
            }else if($data[$i]["ukuran"] == "4x3"){
                $res[$i]["ukuran"] = 3;
            }else if($data[$i]["ukuran"] == "4x4"){
                $res[$i]["ukuran"] = 4;
            }else if($data[$i]["ukuran"] == "5x4"){
                $res[$i]["ukuran"] = 5;
            }else if($data[$i]["ukuran"] == "5x5"){
                $res[$i]["ukuran"] = 6;
            }else if($data[$i]["ukuran"] == "lebih dari 5x5"){
                $res[$i]["ukuran"] = 7;
            }
            
            // Pelabelan kolom "wifi"
            if($data[$i]["wifi"] == "tersedia") {
                $res[$i]["wifi"] = 1;
            }else if($data[$i]["wifi"] == "tidak tersedia"){
                $res[$i]["wifi"] = 2;
            }

            // Pelabelan kolom "toilet"
            if($data[$i]["toilet"] == "di dalam") {
                $res[$i]["toilet"] = 1;
            }else if($data[$i]["toilet"] == "di luar"){
                $res[$i]["toilet"] = 2;
            }
     
            // Pelabelan kolom "kasur"
            if($data[$i]["kasur"] == "tersedia") {
                $res[$i]["kasur"] = 1;
            }else if($data[$i]["kasur"] == "tidak tersedia"){
                $res[$i]["kasur"] = 2;
            }

            // Pelabelan kolom "meja"
            if($data[$i]["meja"] == "tersedia") {
                $res[$i]["meja"] = 1;
            }else if($data[$i]["meja"] == "tidak tersedia"){
                $res[$i]["meja"] = 2;
            }

            // Pelabelan kolom "lemari"
            if($data[$i]["lemari"] == "tersedia") {
                $res[$i]["lemari"] = 1;
            }else if($data[$i]["lemari"] == "tidak tersedia"){
                $res[$i]["lemari"] = 2;
            }
        }

        return $res;
    }

    // Fungsi Perhitungan KNN
    public function KNN($input, $data, $n_terdekat){
        // Definisikan data hasil rekomendasi
        $res = $data;

        // Perhitungan jarak KNN dengan algoritma Manhattan distance antara input dengan data kost
        for ($i=0; $i < count($data) ; $i++) { 
            $res[$i]['jarak'] = 
                abs(($input[0]['ukuran'] - $data[$i]['ukuran'])) + 
                abs(($input[0]['wifi'] - $data[$i]['wifi'])) +
                abs(($input[0]['toilet'] - $data[$i]['toilet'])) +
                abs(($input[0]['kasur'] - $data[$i]['kasur'])) +
                abs(($input[0]['meja'] - $data[$i]['meja'])) +
                abs(($input[0]['lemari'] - $data[$i]['lemari'])) + 
                abs(($input[0]['harga'] - $data[$i]['harga'])) 
            ;
        }

        // Ambil jarak hasil perhitungan
        $key_jarak= array_column($res,'jarak');

        // Urutkan Array data berdasarkan jarak secara Ascending
        array_multisort($key_jarak, SORT_ASC, $res);

        // Kembalikan n data kost teratas yang sudah terutukan berdasarkan jarak
        return array_slice($res, 0, $n_terdekat);
    }

    // Fungsi Cari Kost
    public function cariKost(Request $request){

        // Ambil input user sebagai array
        $arr_input = [
            [
                "id"=>0,
                "ukuran"=>$request->ukuran, 
                "wifi"=>$request->is_wifi,
                "toilet"=>$request->is_toilet,
                "kasur"=>$request->is_kasur,
                "meja"=>$request->is_meja,
                "lemari"=>$request->is_lemari,
                "harga"=>$request->harga,
                "jarak"=> 0
            ]
        ];

        // ambil data kost dari database sebagai array
        $arr_kost = [];

        foreach(Kost::all() as $kost){
            $to_append = [
                "id"=>$kost->id,
                "ukuran"=>$kost->ukuran, 
                "wifi"=>$kost->is_wifi,
                "toilet"=>$kost->is_toilet,
                "kasur"=>$kost->is_kasur,
                "meja"=>$kost->is_meja,
                "lemari"=>$kost->is_lemari,
                "harga"=>$kost->harga,
                "jarak"=> 0
            ];
            array_push($arr_kost,$to_append);
        }
        
        // Preporcessing data input
        $input_data_clean = $this->preprocessing($arr_input);

        // Preprocessing data kost
        $kost_data_clean = $this->preprocessing($arr_kost);

        // Hitung jarak input dengan data kost dengan KNN
        $knn_result = $this->KNN($input_data_clean, $kost_data_clean, 10);

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

        // return view("kost.rcm",[
        //     'input_clean'=>$input_data_clean,
        //     'kost_clean'=>$kost_data_clean,
        //     'knn_result'=> $knn_result,
        //     'id_res'=> $id_sorted,
        //     'kost_end'=> $kost_rekomendasi            
        // ]);
    }
}
