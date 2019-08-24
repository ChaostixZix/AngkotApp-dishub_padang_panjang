<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPesananDerek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pesanan_derek', function (Blueprint $table)
        {
            $table->integer('id')->autoIncrement();
            $table->text('pemesan');
            $table->text('koordinat_pemesan');
            $table->text('alamat_jemput');
            $table->text('koordinat_jemput');
            $table->text('alamat_antar');
            $table->text('koordinat_antar');
            $table->text('jarak');
            $table->text('harga');
            $table->text('nama_pemesan');
            $table->text('nohp_pemesan');
            //0 = Baru, 1 = Diterima Admin, 2 = Proses, 3 = Selesai
            $table->text('status')->default('0');
            $table->text('supir')->nullable();
            $table->date('date');
            $table->time('time');
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
