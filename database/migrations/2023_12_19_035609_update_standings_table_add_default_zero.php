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
        Schema::table('standings', function (Blueprint $table) {
            $table->unsignedBigInteger('wins')->default(0)->change();
            $table->unsignedBigInteger('losses')->default(0)->change();
            $table->unsignedBigInteger('draws')->default(0)->change();
            $table->unsignedBigInteger('goals_scored')->default(0)->change();
            $table->unsignedBigInteger('goals_conceded')->default(0)->change();
            $table->unsignedBigInteger('points')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('standings', function (Blueprint $table) {
            $table->unsignedBigInteger('wins')->default(null)->change();
            $table->unsignedBigInteger('losses')->default(null)->change();
            $table->unsignedBigInteger('draws')->default(null)->change();
            $table->unsignedBigInteger('goals_scored')->default(null)->change();
            $table->unsignedBigInteger('goals_conceded')->default(null)->change();
            $table->unsignedBigInteger('points')->default(null)->change();

        });
    }
};
