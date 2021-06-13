<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kper')->unsigned()->index();
            $table->string('nama');
            $table->enum('tipe',['Tipe A', 'Tipe B', 'Tipe C']);
            $table->string('gambar');
            $table->text('deskripsi');
            $table->foreign('id_kper')->references('id')->on('users');
            $table->timestamps();

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
        Schema::dropIfExists('rumah');
    }
}
