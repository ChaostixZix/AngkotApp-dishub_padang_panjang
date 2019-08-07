<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_profil', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->string('nik')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('status_hubungan_dalam_keluarga')->nullable();
            $table->string('kewarganegaraan')->nullable();
            //DATA IMIGRASI
            $table->string('no_passport')->nullable();
            $table->string('no_kta')->nullable();
            //ORANG TUA
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            //DATA
            $table->string('alamat')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('provinsi')->nullable();
            //FOTO
            $table->string('file_foto')->nullable();
            //KONTAK
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            //SOSIAL MEDIA
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
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
