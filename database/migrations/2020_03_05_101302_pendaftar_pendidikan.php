<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendaftarPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_pendidikan', function (Blueprint $table) {
            $table->text('nisn');

            $table->text('kelas_sebelumnya');

            $table->text('sekolah_asal');
            $table->bigInteger('npsn');
            $table->text('kabupaten_kota');
            $table->integer('no_seri_ijazah');
            $table->text('tanggal_ijazah');
            $table->integer('no_seri_skhun');
            $table->text('tanggal_skhun');
            $table->integer('no_peserta_us');
            $table->text('lama_belajar');

            $table->text('file_ijazah')->nullable();
            $table->text('file_skhun')->nullable();
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
