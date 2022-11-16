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
        Schema::create('anamnesa_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_pasien');
            $table->string('anamnesa');
            $table->string('diagnosa');
            $table->string('pengobatan');
            $table->foreign('uuid_pasien')
                ->references('uuid')
                ->on('registrasi_pasiens')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('anamnesa_pasiens');
    }
};
