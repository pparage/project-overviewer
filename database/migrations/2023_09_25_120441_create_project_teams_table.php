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
        Schema::create('project_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('team_member');

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');;
            $table->unique(['project_id', 'team_member']); // Optional, for unique combinations

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_teams');
    }
};
