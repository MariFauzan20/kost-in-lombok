<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kost;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Seed untuk user data owner
        User::create([
            'username' => 'ismar',
            'email' => "ismar@gamil.com",
            'password'=> bcrypt("12345"),
            'is_owner' => true
        ]);

        User::create([
            'username' => 'apuandi',
            'email' => "apw@gamil.com",
            'password'=> bcrypt("12345"),
            'is_owner' => true
        ]);
        
        // Seed untuk user data pencari kost
        User::create([
            'username' => 'anak_ismar',
            'email' => "anak_ismar@gamil.com",
            'password'=> bcrypt("12345"),
            'is_owner' => false
        ]);

        User::create([
            'username' => 'anak_apuandi',
            'email' => "anak_apw@gamil.com",
            'password'=> bcrypt("12345"),
            'is_owner' => false
        ]);

        // Seed untuk data kost
        $nama = ["Taman Cendana Indah", "Sevila Residence","Mammis Residence","Nirwana Bojong","Mutiara Korelet II","Mutiara Panongan","Pilar Imanan Residence","Triraksa Village 2", "Neo Rajeg City", "Neo Lombok"];
        $kota = ["Mataram","Narmada", "Praya", "Pancor","Mandalika", "Gunung Sari"];
        $kategori = ["Pria", "Wanita"];
        $jumlah_kamar = ["1","2","3","4","5","lebih dari 5"];
        $ukuran = ["2x3", "3x3","4x3", "4x4","5x4", "5x5", "lebih dari 5x5"];
        $is_wifi = ["tersedia", "tidak tersedia"];
        $is_toilet = ["di dalam", "di luar"];
        $is_ac = ["tersedia", "tidak tersedia"];
        $is_kasur = ["tersedia", "tidak tersedia"];
        $is_meja = ["tersedia", "tidak tersedia"];
        $is_lemari = ["tersedia", "tidak tersedia"];
        $harga = [500000, 550000, 600000, 650000, 700000, 750000, 800000, 850000, 900000, 950000, 1000000, 1200000,1400000, 1750000, 2000000];

        for($i = 0 ; $i < count($nama); $i++){
            Kost::create([
                'user_id' => rand(1,2),
                'nama'=> $nama[$i],
                'kota'=> $kota[array_rand($kota)],
                "kategori" => $kategori[array_rand($kategori)],
                "jumlah_kamar" => $jumlah_kamar[array_rand($jumlah_kamar)],
                "ukuran" => $ukuran[array_rand($ukuran)],
                "is_wifi" => $is_wifi[array_rand($is_wifi)],
                "is_ac" => $is_ac[array_rand($is_ac)],
                "is_toilet" => $is_toilet[array_rand($is_toilet)],
                "is_kasur" => $is_kasur[array_rand($is_kasur)],
                "is_meja" => $is_meja[array_rand($is_meja)],
                "is_lemari" => $is_lemari[array_rand($is_lemari)],
                "deskripsi" => "Dekat dengan kampus Universitas X, sekitar 100 m dari kost",
                "alamat" => "Jalan kebumen lombok barat, Dekat pasar Kaget",
                "harga" =>  $harga[array_rand($harga)],
                "gambar" => strval($i+1).".jpg",
                "no_hp" => "+6289632717937" 
            ]);
        }
    }
}
