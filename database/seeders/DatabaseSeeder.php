<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'JARA Admin',
            'email' => 'admin@jara.test',
            'role' => 'ADMIN',
        ]);

        $owner = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $member = User::factory()->create([
            'name' => 'JARA Member',
            'email' => 'member@jara.test',
        ]);

        $project = Project::factory()->create([
            'name' => 'Project Demo',
            'owner_id' => $owner->id,
        ]);

        $project->members()->attach([$owner->id, $member->id]);

        $tasks = Task::factory(3)->create([
            'project_id' => $project->id,
            'created_by' => $owner->id,
        ]);

        $tasks->first()->update(['status' => 'COMPLETED']);
        foreach ($tasks as $task) {
            $task->assignees()->attach($member->id);
        }
    }
}
