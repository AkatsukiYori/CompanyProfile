<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('akun_id', false, true);            
            $table->string('judul');            
            $table->string('slug');
            $table->enum('headline', ['y', 'n']);      
            $table->bigInteger('media_id')->nullable();             
            $table->text('isi');
            $table->datetime('tgl_posting');
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
        Schema::dropIfExists('berita');
    }
}
