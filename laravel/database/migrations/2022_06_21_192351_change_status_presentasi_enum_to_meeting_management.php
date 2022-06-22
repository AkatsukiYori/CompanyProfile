<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusPresentasiEnumToMeetingManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting_management', function (Blueprint $table) {
            $table->enum('status_presentasi', ['belum aktif', 'aktif', 'progress', 'selesai'])->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting_management', function (Blueprint $table) {
            //
        });
    }
}
