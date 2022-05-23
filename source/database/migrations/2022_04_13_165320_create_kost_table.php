<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kost', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('kota');
            $table->string('kategori');
            $table->string('jumlah_kamar');
            $table->string('ukuran');
            $table->string('is_wifi');
            $table->string('is_ac');
            $table->string('is_toilet');
            $table->string('is_kasur');
            $table->string('is_meja');
            $table->string('is_lemari');
            $table->string('deskripsi');
            $table->string('alamat');
            $table->bigInteger('harga');
            $table->string('gambar');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kost');
    }
};
