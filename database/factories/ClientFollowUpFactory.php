<?php

namespace Database\Factories;

use App\Enums\FollowUpStatus;
use App\Enums\MessageTemplate;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientFollowUp>
 */
class ClientFollowUpFactory extends Factory
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
            'next_contact_at' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'last_contacted_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'message_template' => $this->faker->randomElement(MessageTemplate::cases()),
            'status' => $this->faker->randomElement(FollowUpStatus::cases()),
            'note' => $this->faker->optional()->sentence(),
        ];
    }
}
