<?php

namespace Database\Factories;

use App\Enums\AccessType;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccessCredential>
 */
class AccessCredentialFactory extends Factory
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
            'title' => $this->faker->randomElement(['FTP', 'Admin Panel', 'DigitalOcean', 'SSH']),
            'type' => $this->faker->randomElement(AccessType::cases())->value,
            'url' => $this->faker->optional()->url(),
            'login' => $this->faker->userName(),
            'password' => 'secret123', // автоматически зашифруется
            'note' => $this->faker->optional()->sentence(),
        ];
    }
}
