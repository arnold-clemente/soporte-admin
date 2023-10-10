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
        Schema::create('archivosnotas', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('descripcion');
            $table->date('fecha');
            $table->unsignedBigInteger('nota_id')->nullable();
            $table->foreign('nota_id')->references('id')->on('notas')->onDelete('set null');
            
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
        Schema::dropIfExists('archivosnotas');
    }
};
