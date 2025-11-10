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
        Schema::create('events_volunteers', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_volunteer_id')->constrained('users_volunteers')->cascadeOnDelete();
            $table->boolean('accepted')->nullable();
            $table->primary(['event_id', 'user_volunteer_id']);
        });

        Schema::create('events_members', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_member_id')->constrained('users_members')->cascadeOnDelete();
            $table->primary(['event_id', 'user_member_id']);
        });

        Schema::create('organizations_members', function (Blueprint $table) {
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_member_id')->constrained('users_members')->cascadeOnDelete();
            $table->primary(['organization_id', 'user_member_id']);
        });

        Schema::create('organizations_volunteers', function (Blueprint $table) {
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_volunteer_id')->constrained('users_volunteers')->cascadeOnDelete();
            $table->primary(['organization_id', 'user_volunteer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_volunteers');
        Schema::dropIfExists('events_members');
        Schema::dropIfExists('organizations_members');
        Schema::dropIfExists('organizations_volunteers');
    }
};
