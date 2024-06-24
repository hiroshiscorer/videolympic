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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('atleta_id')->unsigned();
            $table->foreign('atleta_id')->references('id')->on('atletas');
            $table->bigInteger('juego_id')->unsigned();
            $table->foreign('juego_id')->references('id')->on('juegos');
            $table->integer('score')->unsigned();
            $table->string('resultado', 256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
