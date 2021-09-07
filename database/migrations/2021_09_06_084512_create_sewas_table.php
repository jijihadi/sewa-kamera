<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->increments('id_sewa');
            $table->integer('admin_id');
            $table->integer('cust_id');
            $table->integer('kamera_id');
            $table->integer('jaminan_id');
            $table->datetime('tanggal_pesan');
            $table->datetime('tanggal_sewa');
            $table->string('harga');
            $table->text('catatan');
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
        Schema::dropIfExists('sewas');
    }
}
