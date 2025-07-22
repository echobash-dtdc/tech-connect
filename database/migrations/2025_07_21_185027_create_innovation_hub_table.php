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
        Schema::create('innovation_hub', function (Blueprint $table) {
            $table->id();
            $table->string('idea_title');
            $table->unsignedBigInteger('submitted_by');
            $table->text('description');
            $table->enum('category', ['Hackathon', 'POC', 'Pilot', 'Innovation']);
            $table->enum('status', ['Submitted', 'Under Review', 'Approved', 'In Progress', 'Completed', 'Rejected']);
            $table->text('business_impact');
            $table->tinyInteger('technical_feasibility'); // Rating (1–5)
            $table->integer('priority_score')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->text('comments')->nullable();
            $table->string('attachments')->nullable();
            $table->timestamps();

            $table->foreign('submitted_by')->references('id')->on('team_members')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('team_members')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('innovation_hub');
    }
};
