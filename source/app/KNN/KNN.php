<?php
 
namespace App\KNN;

class KNN {
    public function preprocessingData($data) {
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
    
    public function computeKNN($input, $data, $n_terdekat){
         // Definisikan data yang akan menjadi hasil rekomendasi
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

}


?>