<?php

namespace App\Models;

use App\Enums\FollowUpStatus;
use App\Enums\MessageTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $client_id
 * @property \Illuminate\Support\Carbon $next_contact_at
 * @property \Illuminate\Support\Carbon|null $last_contacted_at
 * @property MessageTemplate $message_template
 * @property FollowUpStatus $status
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @method static \Database\Factories\ClientFollowUpFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereLastContactedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereMessageTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereNextContactAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientFollowUp whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
