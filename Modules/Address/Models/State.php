<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Observers\CRUDObserver;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
#[ObservedBy([CRUDObserver::class])]
class State extends Model
{
    use HasFactory;
    use SoftDeletes;

    public string $logChannel = "state";

    protected $casts = [
        'name' => 'string',
    ];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'state_id', 'id');
    }
}
