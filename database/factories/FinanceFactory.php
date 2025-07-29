<?php

namespace Database\Factories;

use App\Enums\FinanceType;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Finance>
 */
class FinanceFactory extends Factory
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
            'project_id' => fn () => Project::inRandomOrder()->value('id') ?? Project::factory(),
            'type' => $this->faker->randomElement(FinanceType::cases())->value,
            'amount' => $this->faker->randomFloat(2, 500, 50000),
            'currency' => $this->faker->randomElement(['RUB', 'USD', 'EUR']),
            'description' => $this->faker->optional()->sentence(),
            'date' => $this->faker->dateTimeBetween('-3 months', '+1 month'),
            'is_paid' => $this->faker->boolean(70),
        ];
    }
}
