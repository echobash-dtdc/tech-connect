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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('description')->nullable();
            $table->enum('status', ['Planning', 'In Progress', 'Completed', 'On Hold']);
            $table->enum('domain', ['Infrastructure', 'Security', 'Data', 'Frontend', 'Backend', 'DevOps']);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('project_lead_id')->nullable()->constrained('team_members')->nullOnDelete();
            $table->json('team_members')->nullable();
            $table->json('technologies_used')->nullable();
            $table->string('architecture_diagram')->nullable();
            $table->longText('case_study')->nullable();
            $table->text('outcomes_impact')->nullable();
            $table->enum('priority', ['High', 'Medium', 'Low'])->nullable();
            $table->boolean('visibility')->default(false);
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
