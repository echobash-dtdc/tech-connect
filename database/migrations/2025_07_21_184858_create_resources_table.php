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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('resource_name');
            $table->string('type'); // API, Library, etc.
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->text('access_instructions')->nullable();
            $table->foreignId('owner_team_id')->nullable()->constrained('team_members')->nullOnDelete();
            $table->json('category')->nullable();
            $table->string('documentation')->nullable(); // File path
            $table->timestamp('last_updated')->useCurrent();
            $table->string('access_level')->default('Public');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
