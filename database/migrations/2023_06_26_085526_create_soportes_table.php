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
        Schema::create('soportes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('codigo');
            $table->date('fechasol');
            $table->boolean('solicitud')->nullable()->default(true);
            $table->date('fecharep')->nullable();
            $table->boolean('recepcion')->nullable()->default(false);
            $table->date('fechasop')->nullable();
            $table->boolean('soporte')->nullable()->default(false);

            $table->unsignedBigInteger('tecnico_id')->nullable();
            $table->foreign('tecnico_id')->references('id')->on('tecnicos')->onDelete('set null');
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('set null');
            $table->unsignedBigInteger('nota_id')->unique()->nullable();
            $table->foreign('nota_id')->references('id')->on('notas')->onDelete('set null');
            $table->unsignedBigInteger('informe_id')->unique()->nullable();
            $table->foreign('informe_id')->references('id')->on('informes')->onDelete('set null');
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
        Schema::dropIfExists('soportes');
    }
};
