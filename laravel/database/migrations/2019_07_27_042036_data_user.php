<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_user', function (Blueprint $table)
        {
            $table->bigIncrements('id')->autoIncrement();
           $table->string('nama_lengkap');
           $table->string('username');
           $table->string('password');
           $table->string('level');
           $table->bigInteger('saldo')->default(0);
           $table->integer('verify')->default(0);
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
