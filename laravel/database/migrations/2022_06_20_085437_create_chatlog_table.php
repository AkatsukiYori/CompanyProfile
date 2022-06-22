<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatlog', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');     
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('meeting_management');
            $table->string('isi_message');
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
        Schema::dropIfExists('chatlog');
    }
}
