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
    Schema::create('treinadores', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('cidade');
        $table->string('foto');
        $table->timestamps();
    });

    Schema::create('pokemons', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('tipo'); // adiciona o campo "tipo"
        $table->integer('nivel');
        $table->string('foto');
        $table->unsignedBigInteger('treinador_id')->nullable();

        $table->timestamps();

        $table->foreign('treinador_id')->references('id')->on('treinadores');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('pokemons');
        Schema::dropIfExists('treinadores');
    }

};
