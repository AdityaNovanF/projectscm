<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaktur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pesanan_id')->unsigned();
            $table->string('gambar', 225);
            $table->enum('status', ['Konfirmasi', 'Belum Konfirmasi'])->default('Belum Konfirmasi');
            $table->timestamps();

            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('restrict');
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
        Schema::dropIfExists('faktur');
    }
}
