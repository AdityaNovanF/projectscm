<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->integer('id_kpem')->unsigned();
            $table->string('nama', 50);
            $table->integer('jumlah');
            $table->integer('total');
            $table->enum('status', ['Sudah Terverifikasi', 'Belum Terverifikasi'])->default('Belum Terverifikasi');
            $table->enum('fakturnya', ['Sudah', 'Belum'])->default('Belum');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('restrict');
            $table->foreign('id_kpem')->references('id')->on('users');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
