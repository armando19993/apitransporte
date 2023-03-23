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
        Schema::create('observaciones', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado');
            $table->string('tipoObservacion', 80)->nullable();
            $table->string('descripcion', 200)->nullable();
            $table->unsignedBigInteger('idTransportexOperativo');

            $table->foreign('idTransportexOperativo')->references("id")->on("transportex_operativos")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observaciones');
    }
};
