<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPesananParkir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pesanan_parkir', function (Blueprint $table)
        {
            $table->bigInteger('id')->autoIncrement();
            $table->text('pemesan');
            $table->integer('tempat_parkir');
            $table->text('jenis_kendaraan');
            $table->text('plat_nomor');
            $table->text('harga');
            $table->date('tanggal');
            $table->text('nama_pemesan');
            $table->text('nohp_pemesan');
            $table->integer('status');
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
