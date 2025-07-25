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
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->enum('content_type', ['Banner', 'Leadership Message', 'Quick Link', 'Highlight Card']);
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('image_icon')->nullable();
            $table->string('link_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('active')->default(true);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
