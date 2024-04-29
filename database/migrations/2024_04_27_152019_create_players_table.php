<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('league_id')->index();
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->unsignedBigInteger('league_club_id')->index();
            $table->foreign('league_club_id')->references('id')->on('league_clubs')->onDelete('cascade');
            $table->unsignedBigInteger('experience_id')->index();
            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
            $table->unsignedBigInteger('position_id')->index();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->string('title');
            $table->text('body');
            $table->string('image')->nullable();
            $table->double('price')->default(0);
            $table->timestamps();
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
