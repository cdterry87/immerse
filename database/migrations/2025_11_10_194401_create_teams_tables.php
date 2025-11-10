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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('teams_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('teams_volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_volunteer_id')->constrained('users_volunteers')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('teams_volunteers_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_volunteer_id')->constrained('teams_volunteers')->cascadeOnDelete();
            $table->foreignId('team_role_id')->constrained('teams_roles')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams_volunteers_roles');
        Schema::dropIfExists('teams_volunteers');
        Schema::dropIfExists('teams_roles');
        Schema::dropIfExists('teams');
    }
};
