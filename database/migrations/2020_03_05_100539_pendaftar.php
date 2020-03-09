<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pendaftar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unique();

            $table->bigInteger('nisn');
            $table->text('nama_lengkap');
            $table->bigInteger('nik');
            $table->text('ttl'); //tempat tanggal lahir
            $table->text('jenis_kelamin');
            $table->text('agama');
            $table->text('kewarganegaraan');
            $table->text('anak_ke');
            $table->text('jumlah_saudara');
            $table->text('status_ortu'); // yatim, piatu, yatim piatu
            $table->text('bahasa_nativ');
            $table->text('hobi');
            $table->text('cita_cita');
            $table->text('no_kk');

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
