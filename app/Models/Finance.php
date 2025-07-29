<?php

namespace App\Models;

use App\Enums\FinanceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int|null $client_id
 * @property int|null $project_id
 * @property FinanceType $type
 * @property string $amount
 * @property string $currency
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $date
 * @property bool $is_paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Project|null $project
 * @method static \Database\Factories\FinanceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereIsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Finance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Finance extends Model
{
    /** @use HasFactory<\Database\Factories\FinanceFactory> */
    use HasFactory;

    protected $fillable = [
        'client_id',
        'project_id',
        'type',
        'amount',
        'currency',
        'description',
        'date',
        'is_paid',
    ];

    protected $casts = [
        'type' => FinanceType::class,
        'date' => 'date',
        'is_paid' => 'boolean',
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
