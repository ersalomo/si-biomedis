<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_pasiens', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->primary('uuid');
            $table->string('nama', 50);
            $table->string('tanggal_lahir');
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('alamat');
            $table->string('pekerjaan');
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
        Schema::dropIfExists('registrasi_pasiens');
    }
};
