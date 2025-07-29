<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FileAttachment>
 */
class FileAttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileName = $this->faker->word() . '.png';

        // Создаём временный файл в тестовом диске storage/app/public
        $file = UploadedFile::fake()->create($fileName, 100);

        // Сохраняем файл в storage (например, 'public/uploads')
        Storage::disk('public')->putFileAs('uploads', $file, $fileName);

        return [
            'file_path' => 'uploads/' . $fileName,
            'name' => $fileName,
            'client_id' => fn () => Client::inRandomOrder()->value('id') ?? Client::factory(),
            'project_id' => fn () => Project::inRandomOrder()->value('id') ?? Project::factory(),
        ];
    }
}
