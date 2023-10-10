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
        Schema::create('entrega_componentes', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('equipo_id');
            $table->unsignedBigInteger('entrega_id')->nullable();
            $table->foreign('entrega_id')->references('id')->on('entregas')->onDelete('set null');
            $table->unsignedBigInteger('componente_id')->nullable();
            $table->foreign('componente_id')->references('id')->on('componentes')->onDelete('set null');
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
        Schema::dropIfExists('entrega_componentes');
    }
};
