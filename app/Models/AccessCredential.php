<?php

namespace App\Models;

use App\Enums\AccessType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * @property int $id
 * @property int $project_id
 * @property string $title
 * @property AccessType $type
 * @property string|null $url
 * @property string|null $login
 * @property string $password_encrypted
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $password
 * @property-read \App\Models\Project $project
 * @method static \Database\Factories\AccessCredentialFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential wherePasswordEncrypted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessCredential whereUrl($value)
 * @mixin \Eloquent
 */
class AccessCredential extends Model
{
    /** @use HasFactory<\Database\Factories\AccessCredentialFactory> */
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'type',
        'url',
        'login',
        'password_encrypted',
        'note',
    ];

    protected $casts = [
        'type' => AccessType::class,
    ];

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // Accessor
    public function getPasswordAttribute(): ?string
    {
        try {
            return Crypt::decryptString($this->password_encrypted);
        } catch (\Throwable) {
            return null;
        }
    }

    // Mutator
    public function setPasswordAttribute(string $value): void
    {
        $this->attributes['password_encrypted'] = Crypt::encryptString($value);
    }
}
