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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->date('fecha');
            $table->string('nombre');
            $table->string('marca');
            $table->string('modelo');
            $table->string('tamano');
            $table->boolean('entrega')->nullable()->default(false);
            $table->boolean('reparacion')->nullable()->default(false);
            $table->boolean('prestamo')->nullable()->default(false);
            $table->boolean('devolucion')->nullable()->default(false);
            $table->boolean('almacen')->nullable()->default(false);
            $table->boolean('repliegue')->nullable()->default(false);
            $table->string('estado');
            $table->longText('descripcion');

            $table->unsignedBigInteger('tecnico_id')->nullable();
            $table->foreign('tecnico_id')->references('id')->on('tecnicos')->onDelete('set null');
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('set null');
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
        Schema::dropIfExists('dispositivos');
    }
};
