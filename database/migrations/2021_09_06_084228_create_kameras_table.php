<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kameras', function (Blueprint $table) {
            $table->increments('id_kamera');
            $table->string('nama_kamera');
            $table->string('tipe_kamera');
            $table->string('merk_kamera');
            $table->string('harga_kamera');
            $table->integer('stok');
            $table->string('deskripsi')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('kameras');
    }
}
