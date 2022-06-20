<?php
 
namespace App\KNN;

class KNN {
    
    // Fungsi menghitung KNN
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

    // Fungsi preprocessing
    public function preprocessingData($data) {
        $res = $data;

        // Pelabelan data tiap kolom
        for ($i=0; $i < count($data) ; $i++) { 
            // Pelabelan kolom "ukuran"
            $res[$i]["ukuran"] = $this->labelUkuran($data[$i]["ukuran"]);
            
            // Pelabelan kolom "wifi"
            $res[$i]["wifi"] = $this->labelWifi($data[$i]["wifi"]);
            
            // Pelabelan kolom "toilet"
            $res[$i]["toilet"] = $this->labelToilet($data[$i]["toilet"]);
            
            // Pelabelan kolom "kasur"
            $res[$i]["kasur"] = $this->labelKasur($data[$i]["kasur"]);
            
            // Pelabelan kolom "meja"
            $res[$i]["meja"] = $this->labelMeja($data[$i]["meja"]);
            
            // Pelabelan kolom "lemari"
            $res[$i]["lemari"] = $this->labelLemari($data[$i]["lemari"]);

        }

        return $res;
    }
        
    // Fungsi pelabelan kolom "ukuran"
    private function labelUkuran($ukuran) {
        if($ukuran == "2x3") {
            return 1;
        }else if($ukuran == "3x3"){
            return 2;
        }else if($ukuran == "4x3"){
            return 3;
        }else if($ukuran == "4x4"){
            return 4;
        }else if($ukuran == "5x4"){
            return 5;
        }else if($ukuran == "5x5"){
            return 6;
        }else if($ukuran == "lebih dari 5x5"){
            return 7;
        }
    }

    // Fungsi pelabelan kolom "wifi"
    private function labelWifi($wifi) {
        if($wifi == "tersedia") {
            return 1;
        }else if($wifi == "tidak tersedia"){
            return 2;
        }
    }

    // Fungsi pelabelan kolom "toilet"
    private function labelToilet($toilet) {
        if($toilet == "di dalam") {
            return 1;
        }else if($toilet == "di luar"){
            return 2;
        }
    }

    // Fungsi pelabelan kolom "kasur"
    private function labelKasur($kasur) {
        if($kasur == "tersedia") {
            return 1;
        }else if($kasur == "tidak tersedia"){
            return 2;
        }
    }

    // Fungsi pelabelan kolom "meja"
    private function labelMeja($meja) {
        if($meja == "tersedia") {
            return 1;
        }else if($meja == "tidak tersedia"){
            return 2;
        }
    }

    // Fungsi pelabelan kolom "lemari"
    private function labelLemari($lemari) {
        if($lemari == "tersedia") {
            return 1;
        }else if($lemari == "tidak tersedia"){
            return 2;
        }
    }
}


?>