<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataAngkot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_angkot', function (Blueprint $table)
        {
            $table->bigInteger('id')->autoIncrement()->unique();
            $table->text('nama_angkot');
            $table->text('jurusan');

            //dataMobil
            $table->integer('nomor_registrasi')->nullable();
            $table->text('nama_pemilik')->nullable();
            $table->text('merk')->nullable();
            $table->text('jenis')->nullable();
            $table->text('tahun_pembuatan')->nullable();
            $table->text('isi_silinder')->nullable();
            $table->text('warna_kb')->nullable();
            $table->text('no_rangka')->nullable();
            $table->text('no_mesin')->nullable();
            $table->text('no_bpkb')->nullable();
            $table->text('bahan_bakar')->nullable();
            $table->text('warna_tnkb')->nullable();
            $table->text('no_pol_lama')->nullable();
            $table->text('berat_kb')->nullable();
            $table->text('jumlah_sumbu')->nullable();
            $table->text('jumlah_penumpang')->nullable();
            $table->json('rute')->nullable();
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
