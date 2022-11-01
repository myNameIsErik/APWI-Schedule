<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->nullable();
            $table->foreignId('user_id');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->string('jp');
            $table->string('angkatan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('alasan')->nullable();
            $table->boolean('request')->default(false);
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
        Schema::dropIfExists('jadwals');
    }
}
