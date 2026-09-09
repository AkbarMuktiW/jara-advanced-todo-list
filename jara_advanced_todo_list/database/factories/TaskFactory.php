<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'title' => fake()->sentence(5),
            'description' => fake()->optional()->paragraph(),
            'priority' => fake()->randomElement(['LOW', 'MEDIUM', 'HIGH']),
            'status' => fake()->randomElement(['NOT_STARTED', 'IN_PROGRESS', 'COMPLETED']),
            'deadline' => fake()->optional()->dateTimeBetween('now', '+30 days'),
            'created_by' => User::factory(),
        ];
    }
}
