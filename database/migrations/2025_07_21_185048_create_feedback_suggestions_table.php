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
        Schema::create('feedback_suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->foreignId('submitted_by')->nullable()->constrained('team_members')->nullOnDelete();
            $table->enum('type', ['Feedback', 'Bug Report', 'Feature Request', 'Content Suggestion']);
            $table->text('description');
            $table->enum('priority', ['High', 'Medium', 'Low']);
            $table->enum('status', ['New', 'In Review', 'Resolved', 'Closed']);
            $table->foreignId('assigned_to')->nullable()->constrained('team_members')->nullOnDelete();
            $table->text('response')->nullable();
            $table->timestamps(); // includes created_at for Date Submitted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_suggestions');
    }
};
