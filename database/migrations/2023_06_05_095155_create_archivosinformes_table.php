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
        Schema::create('archivosinformes', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('descripcion');
            $table->date('fecha');
            $table->unsignedBigInteger('informe_id')->nullable();
            $table->foreign('informe_id')->references('id')->on('informes')->onDelete('set null');
            
            $table->unsignedBigInteger('user_id')->nullable();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('archivosinformes');
    }
};
