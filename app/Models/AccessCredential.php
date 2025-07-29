<?php

namespace App\Models;

use App\Enums\AccessType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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
