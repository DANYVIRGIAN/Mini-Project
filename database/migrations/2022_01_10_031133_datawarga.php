<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Datawarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datawarga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('Foto_KTP')->nullable();
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('email')->unique();
            $table->enum('jeniskelamin', ['laki', 'perempuan']);
            $table->enum('status', ['single', 'menikah']);
            $table->enum('status_warga', ['pindah', 'warga']);
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
        Schema::dropIfExists('datawarga');
    }
}
