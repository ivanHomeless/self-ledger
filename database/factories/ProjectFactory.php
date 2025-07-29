<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => fn () => Client::inRandomOrder()->value('id') ?? Client::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(ProjectStatus::cases()),
            'deadline' => $this->faker->optional()->dateTimeBetween('+1 week', '+3 months'),
            'price' => $this->faker->optional()->randomFloat(2, 500, 10000),
            'is_paid' => $this->faker->boolean(30),
        ];
    }
}
