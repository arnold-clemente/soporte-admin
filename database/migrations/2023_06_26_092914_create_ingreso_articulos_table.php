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
        Schema::create('ingreso_articulos', function (Blueprint $table) {
            $table->id();            
            $table->date('fecha');
            $table->integer('cantidad');

            $table->unsignedBigInteger('ingreso_id')->nullable();
            $table->foreign('ingreso_id')->references('id')->on('ingresos')->onDelete('set null');
            $table->unsignedBigInteger('articulo_id')->nullable();
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('set null');
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
        Schema::dropIfExists('ingreso_articulos');
    }
};
