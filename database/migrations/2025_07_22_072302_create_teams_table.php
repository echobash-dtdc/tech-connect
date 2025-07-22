<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Seed with some teams
        DB::table('teams')->insert([
            ['name' => 'Frontend', 'department_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Backend', 'department_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Recruitment', 'department_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Payroll', 'department_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
