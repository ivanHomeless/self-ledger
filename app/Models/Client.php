<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $telegram
 * @property string|null $phone
 * @property string|null $notes
 * @property array<array-key, mixed>|null $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AccessCredential> $accessCredentials
 * @property-read int|null $access_credentials_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileAttachment> $fileAttachments
 * @property-read int|null $file_attachments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Finance> $finances
 * @property-read int|null $finances_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClientFollowUp> $followUps
 * @property-read int|null $follow_ups_count
 * @property-read int|null $notes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reminder> $reminders
 * @property-read int|null $reminders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @mixin \Eloquent
 */
class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'notes', 'tags'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function finances(): HasMany
    {
        return $this->hasMany(Finance::class);
    }

    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function fileAttachments(): HasMany
    {
        return $this->hasMany(FileAttachment::class);
    }

    public function followUps(): HasMany
    {
        return $this->hasMany(ClientFollowUp::class);
    }

    public function accessCredentials(): \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(AccessCredential::class, Project::class);
        // или hasMany если хочешь отдельно привязывать Access напрямую к клиенту — зависит от структуры
    }
}
