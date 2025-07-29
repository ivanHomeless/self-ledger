<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $remind_at
 * @property int|null $client_id
 * @property int|null $project_id
 * @property bool $is_done
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Project|null $project
 * @method static \Database\Factories\ReminderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereRemindAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reminder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reminder extends Model
{
    /** @use HasFactory<\Database\Factories\ReminderFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'remind_at',
        'client_id',
        'project_id',
        'is_done',
    ];

    protected $casts = [
        'remind_at' => 'datetime',
        'is_done' => 'boolean',
    ];

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
