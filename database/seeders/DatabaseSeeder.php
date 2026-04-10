<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create regular user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // Create sample projects
        $project1 = Project::create([
            'name' => 'Website Redesign',
            'description' => 'Redesign the company website',
        ]);

        $project2 = Project::create([
            'name' => 'Mobile App',
            'description' => 'Build a mobile application',
        ]);

        // Create sample tasks
        Task::create([
            'title' => 'Design homepage',
            'status' => 'TODO',
            'priority' => 'HIGH',
            'due_date' => now()->addDays(5),
            'project_id' => $project1->id,
            'user_id' => $user->id,
        ]);

        Task::create([
            'title' => 'Implement API',
            'status' => 'IN_PROGRESS',
            'priority' => 'HIGH',
            'due_date' => now()->addDays(3),
            'project_id' => $project2->id,
            'user_id' => $user->id,
        ]);
    }
}
