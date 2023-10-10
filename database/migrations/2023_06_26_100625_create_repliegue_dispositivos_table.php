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
        Schema::create('repliegue_dispositivos', function (Blueprint $table) {
            $table->id();            
            $table->string('descripcion');

            $table->unsignedBigInteger('repliegue_id')->nullable();
            $table->foreign('repliegue_id')->references('id')->on('repliegues')->onDelete('set null');
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
        Schema::dropIfExists('repliegue_dispositivos');
    }
};
