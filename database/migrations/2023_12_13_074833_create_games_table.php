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
        Schema::create('games', function (Blueprint $table) {
            $table->id('gameID');
            $table->unsignedBigInteger('team1ID');
            $table->unsignedBigInteger('team2ID');
            $table->dateTime('date');
            $table->integer('scoreTeam1')->nullable();
            $table->integer('scoreTeam2')->nullable();
            $table->timestamps();

            $table->foreign('team1ID')->references('TeamID')->on('teams');
            $table->foreign('team2ID')->references('TeamID')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
