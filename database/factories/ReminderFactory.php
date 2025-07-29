<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reminder>
 */
class ReminderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->paragraph(),
            'remind_at' => $this->faker->dateTimeBetween('-1 week', '+1 month'),
            'client_id' => fn () => Client::inRandomOrder()->value('id') ?? Client::factory(),
            'project_id' => fn () => Project::inRandomOrder()->value('id') ?? Project::factory(),
            'is_done' => $this->faker->boolean(20),
        ];
    }
}
