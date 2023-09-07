<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunjanganKaryasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan_karyas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ikk');
            $table->foreign('id_ikk')->references('id')->on('ikks')->onDelete('cascade');
            $table->unsignedBigInteger('id_hariKerja');
            $table->foreign('id_hariKerja')->references('id')->on('hari_kerjas')->onDelete('cascade');
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
        Schema::dropIfExists('tunjangan_karyas');
    }
}
