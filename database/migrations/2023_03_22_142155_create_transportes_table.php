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
        Schema::create('transportes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_placa', 7);
            $table->string('soat', 20);
            $table->boolean('estado');
            $table->string('codigo_etiqueta_nfc');
            $table->unsignedBigInteger('idConsesionaria');
            $table->unsignedBigInteger('idConductor')->nullable();

            $table->foreign('idConsesionaria')->references("id")->on("consesionarias")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('idConductor')->references("id")->on("conductors")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportes');
    }
};
