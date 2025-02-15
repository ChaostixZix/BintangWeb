<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('nisn')->primary();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->timestamps();
        });

        Schema::create('sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_sekolah');
            $table->timestamps();
        });

        Schema::create('pendaftar', function (Blueprint $table) {
            $table->string('nisn');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('sekolah');
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('user')->onDelete('cascade');
        });

        Schema::create('pendaftar_ppdb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nisn');
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('user')->onDelete('cascade');
        });

        Schema::create('pendaftar_pendidikan', function (Blueprint $table) {
            $table->string('nisn');
            $table->string('asal_sekolah');
            $table->string('npsn_sekolah');
            $table->string('alamat_sekolah');
            $table->string('no_ijazah');
            $table->string('no_skhun');
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('user')->onDelete('cascade');
        });

        Schema::create('pendaftar_kesehatan', function (Blueprint $table) {
            $table->string('nisn');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('golongan_darah');
            $table->text('riwayat_penyakit')->nullable();
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('user')->onDelete('cascade');
        });

        Schema::create('pendaftar_ayah', function (Blueprint $table) {
            $table->string('nisn');
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('penghasilan');
            $table->string('pendidikan');
            $table->string('no_hp');
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('user')->onDelete('cascade');
        });

        Schema::create('pendaftar_ibu', function (Blueprint $table) {
            $table->string('nisn');
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('penghasilan');
            $table->string('pendidikan');
            $table->string('no_hp');
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('user')->onDelete('cascade');
        });

        Schema::create('pendaftar_wali', function (Blueprint $table) {
            $table->string('nisn');
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('penghasilan');
            $table->string('pendidikan');
            $table->string('no_hp');
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('user')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftar_wali');
        Schema::dropIfExists('pendaftar_ibu');
        Schema::dropIfExists('pendaftar_ayah');
        Schema::dropIfExists('pendaftar_kesehatan');
        Schema::dropIfExists('pendaftar_pendidikan');
        Schema::dropIfExists('pendaftar_ppdb');
        Schema::dropIfExists('pendaftar');
        Schema::dropIfExists('sekolah');
        Schema::dropIfExists('user');
    }
}