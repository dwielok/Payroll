<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunjanganTransportasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan_transportasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jabatan');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');
            $table->unsignedBigInteger('id_absensi');
            $table->foreign('id_absensi')->references('id')->on('absensis')->onDelete('cascade');
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
        Schema::dropIfExists('tunjangan_transportasis');
    }
}
