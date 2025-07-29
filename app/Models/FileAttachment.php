<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $file_path
 * @property string $name
 * @property int|null $client_id
 * @property int|null $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Project|null $project
 * @method static \Database\Factories\FileAttachmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FileAttachment extends Model
{
    /** @use HasFactory<\Database\Factories\FileAttachmentFactory> */
    use HasFactory;

    protected $fillable = [
        'file_path',
        'name',
        'client_id',
        'project_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
