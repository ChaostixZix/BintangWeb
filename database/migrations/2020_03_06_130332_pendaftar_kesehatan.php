<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendaftarKesehatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_kesehatan', function (Blueprint $table)
        {
           $table->bigInteger('nisn');

           $table->text('golongan_darah');
           $table->text('riwayat_penyakit');
           $table->text('kelainan_jasmani');
           $table->text('tinggi_badan');
           $table->text('berat_badan');
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
