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
        Schema::create('devolucion_dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');

            $table->unsignedBigInteger('devolucion_id')->nullable();
            $table->foreign('devolucion_id')->references('id')->on('devolucions')->onDelete('set null');
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
        Schema::dropIfExists('devolucion_dispositivos');
    }
};
