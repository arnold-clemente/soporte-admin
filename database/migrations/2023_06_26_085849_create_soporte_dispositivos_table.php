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
        Schema::create('soporte_dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('falencia');
            $table->string('solucion')->nullable();
            $table->string('estado')->nullable();

            $table->unsignedBigInteger('soporte_id')->nullable();
            $table->foreign('soporte_id')->references('id')->on('soportes')->onDelete('set null');
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
        Schema::dropIfExists('soporte_dispositivos');
    }
};
