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
        Schema::rename('team_team_group', 'team_group_team');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('team_group_team', 'team_team_group');
    }
};
