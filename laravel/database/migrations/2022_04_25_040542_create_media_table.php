<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('akun_id', false, true);
            $table->string('name');
            $table->enum('kategori', ['image', 'video', 'link']);
            $table->enum('jenis',['product', 'berita', 'mitra']);
            $table->date('tgl_media');
            $table->text('link')->nullable();
            $table->foreign('akun_id')->references('id')->on('users');
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
        Schema::dropIfExists('media');
    }
}
