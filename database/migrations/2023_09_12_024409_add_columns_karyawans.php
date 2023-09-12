<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsKaryawans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jabatan')->after('id_tipe');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');
            $table->unsignedBigInteger('id_golongan')->after('id_jabatan');
            $table->foreign('id_golongan')->references('id')->on('golongans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            //remove foreign
            $table->dropForeign(['id_jabatan']);
            $table->dropForeign(['id_golongan']);
            //drop columns
            $table->dropColumn(['id_jabatan', 'id_golongan']);
        });
    }
}
