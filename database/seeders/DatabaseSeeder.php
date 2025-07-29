<?php

namespace Database\Seeders;

use App\Models\AccessCredential;
use App\Models\Client;
use App\Models\ClientFollowUp;
use App\Models\FileAttachment;
use App\Models\Finance;
use App\Models\Note;
use App\Models\Project;
use App\Models\Reminder;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->clearUploadFiles();

        User::factory(10)->create();
        Client::factory(10)->create();
        Project::factory(10)->create();
        Task::factory(10)->create();
        Finance::factory(10)->create();
        Reminder::factory(10)->create();
        Note::factory(10)->create();
        FileAttachment::factory(2)->create();
        ClientFollowUp::factory(2)->create();
        AccessCredential::factory(10)->create();
    }

    protected function clearUploadFiles(): void
    {
        // Удаляем все файлы и папки внутри storage/app/public/uploads
        Storage::disk('public')->deleteDirectory('uploads');

        // Создаем пустую папку заново (на всякий случай)
        Storage::disk('public')->makeDirectory('uploads');
    }
}
