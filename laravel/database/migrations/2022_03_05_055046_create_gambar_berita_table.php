<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_berita', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('berita_id', false, true);            
            $table->string('name');
            $table->text('deskripsi');
            $table->foreign('berita_id')->references('id')->on('berita');
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
        Schema::dropIfExists('gambar_berita');
    }
}
