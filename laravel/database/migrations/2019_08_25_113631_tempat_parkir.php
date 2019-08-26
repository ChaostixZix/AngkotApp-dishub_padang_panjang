<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempatParkir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat_parkir', function (Blueprint $table)
        {
            $table->bigInteger('id')->autoIncrement();
            $table->text('nama_tempat');
            $table->text('harga_mobil');
            $table->text('harga_motor');
            $table->bigInteger('kapasitas');
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
