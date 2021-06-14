<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKprTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpr', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alamat');
            $table->string('fotoKK');
            $table->string('fotoKTP');
            $table->string('gaji');
            $table->enum('status',['Pengajuan', 'Diterima']);
            $table->integer('id_rumah')->unsigned();
            $table->timestamps();

            $table->foreign('id_rumah')->references('id')->on('rumah')->onDelete('restrict');
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
        Schema::dropIfExists('kpr');
    }
}