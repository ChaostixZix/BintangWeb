<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendaftarAyah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_ayah', function (Blueprint $table)
        {
            $table->integer('nisn');

            $table->text('nama_lengkap');
            $table->integer('nik_ayah');
            $table->text('tempat_lahir');
            $table->text('tanggal_lahir');
            $table->text('agama');
            $table->text('pendidikan_terakhir');
            $table->text('pekerjaan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
