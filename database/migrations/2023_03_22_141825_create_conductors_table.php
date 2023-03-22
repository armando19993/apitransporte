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
        Schema::create('conductors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellido', 100);
            $table->integer('dni');
            $table->string('celular', 80);
            $table->integer('anios_experiencia');
            $table->string('numero_licencia', 9);
            $table->unsignedBigInteger('idInspector');
            $table->foreign('idInspector')->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductors');
    }
};
