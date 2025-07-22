<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            if (!Schema::hasColumn('team_members', 'department_id')) {
                $table->foreignId('department_id')->nullable()->constrained()->onDelete('set null');
            }
            if (!Schema::hasColumn('team_members', 'team_id')) {
                $table->foreignId('team_id')->nullable()->constrained()->onDelete('set null');
            }
            if (!Schema::hasColumn('team_members', 'direct_reports')) {
                $table->json('direct_reports')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            if (Schema::hasColumn('team_members', 'department_id')) {
                $table->dropForeign(['department_id']);
                $table->dropColumn('department_id');
            }
            if (Schema::hasColumn('team_members', 'team_id')) {
                $table->dropForeign(['team_id']);
                $table->dropColumn('team_id');
            }
            if (Schema::hasColumn('team_members', 'direct_reports')) {
                $table->dropColumn('direct_reports');
            }
        });
    }
};
