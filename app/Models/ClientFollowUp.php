<?php

namespace App\Models;

use App\Enums\FollowUpStatus;
use App\Enums\MessageTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFollowUp extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFollowUpFactory> */
    use HasFactory;

    protected $fillable = [
        'client_id',
        'next_contact_at',
        'last_contacted_at',
        'message_template',
        'status',
        'note',
    ];

    protected $casts = [
        'next_contact_at' => 'datetime',
        'last_contacted_at' => 'datetime',
        'status' => FollowUpStatus::class,
        'message_template' => MessageTemplate::class,
    ];

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
