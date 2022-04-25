<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentangKamiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentang_kami', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('akun_id', false, true);
            $table->string('judul');
            $table->bigInteger('media_id');         
            $table->text('deskripsi');
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
        Schema::dropIfExists('tentang_kami');
    }
}
