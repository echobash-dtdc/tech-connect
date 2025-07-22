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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->enum('type', ['Tech Meetup', 'Town Hall', 'Training', 'Hackathon', 'Release']);
            $table->text('description')->nullable();
            $table->dateTime('date_time');
            $table->integer('duration')->nullable(); // in minutes
            $table->string('location_link')->nullable();
            $table->foreignId('organizer_id')->constrained('team_members');
            $table->json('target_audience')->nullable();
            $table->string('registration_link')->nullable();
            $table->string('materials')->nullable();
            $table->enum('status', ['Upcoming', 'Ongoing', 'Completed', 'Cancelled']);
            $table->integer('attendee_limit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
