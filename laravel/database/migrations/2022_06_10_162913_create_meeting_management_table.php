<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_management', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->string('narasumber');
            $table->integer('sisa_waktu');
            $table->datetime('waktu_timer')->nullable();
            $table->integer('jumlah_menit');
            $table->string('slug')->nullable();
            $table->enum('status_presentasi', ['belum aktif', 'aktif', 'progress', 'selesai']);
            $table->enum('status', ['belum aktif', 'aktif', 'selesai']);
            $table->datetime('jam_mulai');
            $table->datetime('jam_selesai');
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
        Schema::dropIfExists('meeting_management');
    }
}
