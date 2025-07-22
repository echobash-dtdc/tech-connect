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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('role_title')->nullable();
            $table->string('department')->nullable();
            $table->string('team')->nullable();
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
            $table->json('skills')->nullable();
            $table->string('contact_number')->nullable();
            $table->foreignId('manager_id')->nullable()->constrained('team_members')->nullOnDelete();
            $table->json('direct_reports')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->boolean('active')->default(true);
            $table->date('join_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
