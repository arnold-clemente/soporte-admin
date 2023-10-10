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
        Schema::create('prestamo_dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');

            $table->unsignedBigInteger('prestamo_id')->nullable();
            $table->foreign('prestamo_id')->references('id')->on('prestamos')->onDelete('set null');
            $table->unsignedBigInteger('dispositivo_id')->nullable();
            $table->foreign('dispositivo_id')->references('id')->on('dispositivos')->onDelete('set null');
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
        Schema::dropIfExists('prestamo_dispositivos');
    }
};
