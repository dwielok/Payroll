<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipe');
            $table->foreign('id_tipe')->references('id')->on('tipes')->onDelete('cascade');
            $table->string('nip');
            $table->string('nama_karyawan');
            $table->string('masa_kerja');
            $table->string('email');
            $table->string('pendidikan');
            $table->string('no_rek');
            $table->string('nama_bank');
            $table->string('no_kitap');
            $table->string('no_bpjs_kesehatan');
            $table->string('no_bpjs_ketenagakerjaan');
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
        Schema::dropIfExists('karyawans');
    }
}
