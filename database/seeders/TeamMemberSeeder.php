<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;
use App\Models\Department;
use App\Models\Team;
use Faker\Factory as Faker;

class TeamMemberSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $departments = Department::all();
        $teams = Team::all();

        for ($i = 0; $i < 10; $i++) {
            $department = $departments->random();
            $team = $teams->where('department_id', $department->id)->random();

            TeamMember::create([
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'role_title' => $faker->jobTitle,
                'department_id' => $department->id,
                'team_id' => $team->id,
                'photo' => null,
                'bio' => json_encode(['info' => $faker->sentence]),
                'skills' => json_encode($faker->words(5)),
                'contact_number' => $faker->phoneNumber,
                'manager_id' => null, // Can be assigned in a second pass
                'direct_reports' => null,
                'linkedin_url' => 'https://linkedin.com/in/' . $faker->userName,
                'active' => $faker->boolean,
                'join_date' => $faker->date,
            ]);
        }

        // Assign managers and direct reports
        $allMembers = TeamMember::all();
        foreach ($allMembers as $member) {
            $manager = $allMembers->where('id', '!=', $member->id)->random();
            $member->manager_id = $manager->id;
            $reports = $allMembers->where('id', '!=', $member->id)->where('id', '!=', $manager->id)->random(2)->pluck('id');
            $member->direct_reports = $reports;
            $member->save();
        }
    }
}
