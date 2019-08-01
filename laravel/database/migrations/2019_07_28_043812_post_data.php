<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_data', function (Blueprint $table)
        {
           $table->bigIncrements('id')->autoIncrement();
           $table->string('judul');
           $table->longText('konten');
           $table->string('author');
           $table->string('gambar')->nullable();
           $table->string('kategori');
           $table->dateTime('created_at');
           $table->dateTime('updated_at')->nullable();
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
