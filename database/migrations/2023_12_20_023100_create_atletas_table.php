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
        Schema::create('atletas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 128);
            $table->string('integrantes', 64)->nullable();
            $table->string('imagen', 64)->nullable();
            $table->string('color', 64);
            $table->bigInteger('juego_id')->unsigned()->nullable();
            $table->foreign('juego_id')->references('id')->on('juegos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atletas');
    }
};
