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
        Schema::create('encriptations', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellido');
            $table->string('codigo');
            $table->string('numero_tarjeta');
            $table->string('vencimiento');
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
        Schema::dropIfExists('encriptations');
    }
};
