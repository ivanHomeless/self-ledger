<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph(),
            'client_id' => fn () => Client::inRandomOrder()->value('id') ?? Client::factory(),
            'project_id' => fn () => Project::inRandomOrder()->value('id') ?? Project::factory(),
            'pinned' => $this->faker->boolean(10),
        ];
    }
}
