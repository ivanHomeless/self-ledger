<?php

namespace Database\Factories;

use App\Enums\TaskStatus;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => fn () => Project::inRandomOrder()->value('id') ?? Project::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->paragraph(),
            'status' => $this->faker->randomElement(TaskStatus::cases())->value,
            'due_date' => $this->faker->optional()->dateTimeBetween('now', '+2 weeks'),
        ];
    }
}
