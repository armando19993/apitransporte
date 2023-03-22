<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 80);
            $table->string('apellido', 80);
            $table->string('dni', 8);
            $table->string('direccion', 80);
            $table->date('fecha_nacimiento');
            $table->string('sexo', 1);
            $table->string('contrasena', 80);
            $table->string('usuario', 80);
            $table->integer('rol');
            $table->integer('idAdministrador')->nullable(); //Este campo se agrega para filtrar los inspectores de cada administrador
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
