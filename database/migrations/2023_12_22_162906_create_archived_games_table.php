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
        Schema::create('archived_games', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('teamname');
            $table->integer('points');
            $table->string('topscorer_name');
            $table->integer('topscorer_goals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived_games');
    }
};
