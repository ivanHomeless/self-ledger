<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'      => $this->faker->name(),
            'email'     => $this->faker->unique()->safeEmail(),
            'telegram'  => $this->faker->unique()->firstName(),
            'phone'     => $this->faker->phoneNumber(),
            'notes'     => $this->faker->optional()->paragraph(),
            'tags' => json_encode($this->faker->randomElements([
                'VIP', 'website', 'recurring', 'cold_lead', 'urgent', 'seo', 'design'
            ], rand(0, 3))),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
