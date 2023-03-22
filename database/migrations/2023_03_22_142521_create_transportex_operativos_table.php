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
        Schema::create('transportex_operativos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idOperativo');
            $table->unsignedBigInteger('idTransporte');

            $table->foreign('idOperativo')->references("id")->on("operativos")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('idTransporte')->references("id")->on("transportes")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportex_operativos');
    }
};
