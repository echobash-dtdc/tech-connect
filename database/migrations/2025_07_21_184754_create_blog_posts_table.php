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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained('team_members')->onDelete('cascade');
            $table->longText('content');
            $table->string('category');
            $table->json('tags')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('status')->default('Draft');
            $table->date('publish_date')->nullable();
            $table->unsignedInteger('views_count')->default(0);
            $table->string('reading_time')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
