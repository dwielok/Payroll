<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->foreignId('id_tipeKaryawan')->constrained('tipe_karyawan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('NIP');
            $table->string('nama_karyawan');
            $table->string('masa_kerja');
            $table->string('email');
            $table->string('pendidikan');
            $table->string('nama_bank');
            $table->string('no_rek');
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
        Schema::dropIfExists('karyawan');
    }
}
