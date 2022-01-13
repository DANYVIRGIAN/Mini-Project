<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Datarumah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datarumah', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor');
            $table->string('alamat');
            $table->integer('id_pemilik')->unique();
            $table->integer('id_penghuni')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datarumah');
    }
}
