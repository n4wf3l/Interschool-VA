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
        Schema::create('players', function (Blueprint $table) {
            $table->id('playerID');
            $table->unsignedBigInteger('teamID');
            $table->unsignedBigInteger('userID');
            $table->boolean('reserveplayer')->default(false);
            $table->boolean('teamleader')->default(false);
            $table->integer('goals')->default(0);
            $table->timestamps();

            $table->foreign('teamID')->references('TeamID')->on('teams');
            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
