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
            'email' => "ismar@gmail.com",
            'password'=> bcrypt("12345"),
            'is_owner' => true
        ]);

        User::create([
            'username' => 'mari',
            'email' => "mari@gmail.com",
            'password'=> bcrypt("12345"),
            'is_owner' => true
        ]);
        
        // Seed untuk user data pencari kost
        User::create([
            'username' => 'sendy',
            'email' => "sendy@gamil.com",
            'password'=> bcrypt("12345"),
            'is_owner' => false
        ]);


        // Seed untuk data kost
        // $nama = ["Taman Cendana Indah", "Sevila Residence","Mammis Residence","Nirwana Bojong","Mutiara Korelet II","Mutiara Panongan","Pilar Imanan Residence","Triraksa Village 2", "Neo Rajeg City", "Neo Lombok"];
        // $kota = ["Mataram","Narmada", "Praya", "Pancor","Mandalika", "Gunung Sari"];
        // $kategori = ["Pria", "Wanita"];
        // $jumlah_kamar = ["1","2","3","4","5","lebih dari 5"];
        // $ukuran = ["2x3", "3x3","4x3", "4x4","5x4", "5x5", "lebih dari 5x5"];
        // $is_wifi = ["tersedia", "tidak tersedia"];
        // $is_toilet = ["di dalam", "di luar"];
        // $is_ac = ["tersedia", "tidak tersedia"];
        // $is_kasur = ["tersedia", "tidak tersedia"];
        // $is_meja = ["tersedia", "tidak tersedia"];
        // $is_lemari = ["tersedia", "tidak tersedia"];
        // $harga = [500000, 550000, 600000, 650000, 700000, 750000, 800000, 850000, 900000, 950000, 1000000, 1200000,1400000, 1750000, 2000000];

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Setia Budi",
            'kota'=> "Mataram",
            "kategori" => "Pria",
            "jumlah_kamar" => "4",
            "ukuran" => "3x3",
            "is_wifi" => "tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tidak tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Lokas kost dekat dengan kampus dan prasarana lain",
            "alamat" => "Jalan setiabudi, sebelah pasar senin",
            "harga" =>  750000,
            "gambar" => "Kost1.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Bunda Kita",
            'kota'=> "Praya",
            "kategori" => "Wanita",
            "jumlah_kamar" => "4",
            "ukuran" => "4x3",
            "is_wifi" => "tersedia",
            "is_ac" => "tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" =>"tersedia",
            "is_meja" => "tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Letak Kos dekat cukup jauh dari universitas, namun terletak di sebalah indomaret dan alfamart",
            "alamat" => "Jalan damai selalu nomer 45",
            "harga" =>  1000000,
            "gambar" => "Kost2.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Selalu Ada",
            'kota'=> "Mandalika",
            "kategori" => "Wanita",
            "jumlah_kamar" => "2",
            "ukuran" => "4x4",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" => "tersedia",
            "is_meja" => "tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Kost selalu dibersihkan secara berkala seminggu sekali",
            "alamat" => "Jalan Ramai Budi nomer 44",
            "harga" =>  750000,
            "gambar" => "Kost3.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Bersama",
            'kota'=> "Mataram",
            "kategori" => "Wanita",
            "jumlah_kamar" => "2",
            "ukuran" => "5x5",
            "is_wifi" => "tersedia",
            "is_ac" => "tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" => "tersedia",
            "is_meja" => "tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Kamar luas dan semua fasilitas tersedia",
            "alamat" => "Jalan Bersama Dia dekat dengan orang lain nomer 666",
            "harga" =>  1400000,
            "gambar" => "Kost4.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Hati hati",
            'kota'=> "Narmada",
            "kategori" => "Pria",
            "jumlah_kamar" => "5",
            "ukuran" => "4x3",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Suasana kos nyaman dan aman",
            "alamat" => "Jalan Sesuka Hati nomer 32, sebelah indomart",
            "harga" =>  750000,
            "gambar" => "Kost5.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Rumah Pak Kardi",
            'kota'=> "Pancor",
            "kategori" => "Pria",
            "jumlah_kamar" => "lebih dari 5",
            "ukuran" => "3x3",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" => "tersedia",
            "is_meja" => "tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "dekat dengan lokasi pasar sehingga bisa mudah dalam mencari makanan",
            "alamat" => "Jalan Rumah Baru nomer 90",
            "harga" =>  500000,
            "gambar" => "Kost6.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Rumah Pak Jono",
            'kota'=> "Gunung Sari",
            "kategori" => "Pria",
            "jumlah_kamar" => "5",
            "ukuran" => "4x3",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di luar",
            "is_kasur" => "tersedia",
            "is_meja" =>"tidak tersedia",
            "is_lemari" => "tidak tersedia",
            "deskripsi" => "letak kost sangat strategis",
            "alamat" => "Jalan keberatan masalah yang sedang dihadapi nomer 78",
            "harga" =>  450000,
            "gambar" => "Kost7.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Kost an",
            'kota'=> "Mandalika",
            "kategori" => "Wanita",
            "jumlah_kamar" => "3",
            "ukuran" => "4x4",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" =>"tersedia" ,
            "deskripsi" => "Sarana yang diberikan masih baru",
            "alamat" => "Jalan Sama dia tapi nikah sama orang lain nomer 98",
            "harga" =>  800000,
            "gambar" => "Kost8.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Bunda Mulia",
            'kota'=> "Pancor",
            "kategori" => "Wanita",
            "jumlah_kamar" => "5",
            "ukuran" => "4x4",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Lokasi kost sangat mudah dijangkau dari manapun",
            "alamat" => "Jalan Rumah Tangga Baru nomer 45",
            "harga" =>  800000,
            "gambar" => "Kost9.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Selalu",
            'kota'=> "Mataram",
            "kategori" => "Pria",
            "jumlah_kamar" => "4",
            "ukuran" => "5x4",
            "is_wifi" => "tersedia",
            "is_ac" => "tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Lokasi mudah diakses dengan menggunakan kendaraan apapun",
            "alamat" => "Jalan kebumen lombok barat, Dekat pasar Kaget",
            "harga" =>  1000000,
            "gambar" => "Kost10.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Bunda Mulya",
            'kota'=> "Gunung Sari",
            "kategori" => "Pria",
            "jumlah_kamar" => "3",
            "ukuran" => "4x4",
            "is_wifi" => "tersedia",
            "is_ac" => "tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "jumlah kamar yang disediakan cukup banyak",
            "alamat" => "Jalan Rumah Lama, sebalah pasar lama kota",
            "harga" =>  800000,
            "gambar" => "Kost11.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Bersama Pak Jarwo",
            'kota'=> "Gunung Sari",
            "kategori" => "Pria",
            "jumlah_kamar" => "4",
            "ukuran" => "4x4",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Pilihan sarana yang diberikan sangat banyak dan beragam",
            "alamat" => "Jalan Setia Kawan Nomer 99",
            "harga" =>  950000,
            "gambar" => "Kost12.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Sulis",
            'kota'=> "Praya",
            "kategori" => "Wanita",
            "jumlah_kamar" => "2",
            "ukuran" => "5x5",
            "is_wifi" => "tersedia",
            "is_ac" => "tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "dalam kost disediakan dapur untuk memasak para penghuni kost",
            "alamat" => "Jalan Koki Mas nomer 665",
            "harga" =>  750000,
            "gambar" => "Kost13.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Nur",
            'kota'=> "Pancor",
            "kategori" => "Wanita",
            "jumlah_kamar" => "lebih dari 5",
            "ukuran" => "3x3",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" => "tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Lokasi dari kost dekat dengan jalan utama kota",
            "alamat" => "Jalan Sebelah Dia nomer 45, sebelah kantor kepala desa",
            "harga" =>   800000,
            "gambar" => "Kost14.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Hati Murti",
            'kota'=> "Narmada",
            "kategori" => "Mataram",
            "jumlah_kamar" => "4",
            "ukuran" => "4x4",
            "is_wifi" => "tersedia",
            "is_ac" => "tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Lokasi kost sangat aman dan nyaman",
            "alamat" => "Jalan Rumah Tangga Bersama Dia nomer 76",
            "harga" =>  1000000,
            "gambar" => "Kost15.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Bu Marni",
            'kota'=> "Mandalika",
            "kategori" => "Wanita",
            "jumlah_kamar" => "5",
            "ukuran" => "4x4",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Sebuah kost yang menyediakan segala kebutuhan para penghuninya",
            "alamat" => "Jalan Rumah Rumahan nomer 33",
            "harga" =>  750000,
            "gambar" => "Kost16.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Julian",
            'kota'=> "Narmada",
            "kategori" => "Pria",
            "jumlah_kamar" => "3",
            "ukuran" => "3x3",
            "is_wifi" => "tidak tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" => "tersedia",
            "is_meja" => "tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Menerima kost untuk waktu yang cukup lama",
            "alamat" => "Jalan Bersama dia nomer 12",
            "harga" =>  750000,
            "gambar" => "Kost17.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Berharga",
            'kota'=> "Pancor",
            "kategori" => "Pria",
            "jumlah_kamar" => "3",
            "ukuran" => "3x3",
            "is_wifi" => "tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di luar",
            "is_kasur" => "tersedia",
            "is_meja" => "tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Lokasi kost di jaga oleh satpam sehingga sangat aman",
            "alamat" => "Jalan Nomer 39",
            "harga" =>  900000,
            "gambar" => "Kost18.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Google",
            'kota'=> "Mataram",
            "kategori" => "Pria",
            "jumlah_kamar" => "4",
            "ukuran" => "5x5",
            "is_wifi" => "tersedia",
            "is_ac" => "tersedia",
            "is_toilet" => "di dalam",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Lokasi kost sangat sejuk dan nyaman",
            "alamat" => "Jalan Selalu Ada nomer 75",
            "harga" =>  1400000,
            "gambar" => "Kost19.jpg",
            "no_hp" => "+6289632717937" 
        ]);

        Kost::create([
            'user_id' => rand(1,2),
            'nama'=> "Kost Serambi",
            'kota'=> "Mataram",
            "kategori" => "Wanita",
            "jumlah_kamar" => "3",
            "ukuran" => "4x3",
            "is_wifi" => "tersedia",
            "is_ac" => "tidak tersedia",
            "is_toilet" => "di luar",
            "is_kasur" =>"tersedia",
            "is_meja" =>"tersedia",
            "is_lemari" => "tersedia",
            "deskripsi" => "Segala fasilitas yang diberikan masih baru",
            "alamat" => "Jalan Setia Selalu Jaya Bersama nomer 67",
            "harga" =>  750000,
            "gambar" => "Kost20.jpg",
            "no_hp" => "+6289632717937" 
        ]);
    }
}
