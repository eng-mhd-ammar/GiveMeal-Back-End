<?php

namespace Modules\Donation\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Observers\CascadeSoftDeleteObserver;
use Modules\Core\Observers\SyncFilesObserver;
use Modules\Core\Observers\CRUDObserver;
use Modules\Donation\Enums\DonationType;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Models\User;
use Modules\Donation\Enums\DonationStatus;
use Modules\Institution\Models\Branch;

#[Fillable(['sender_branch_id', 'sender_user_id', 'receiver_branch_id', 'receiver_user_id', 'title', 'description', 'status', 'sent_at', 'received_at', 'notes'])]
#[ObservedBy([CRUDObserver::class, CascadeSoftDeleteObserver::class])]
class Donation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public array $cascadeDeletes = ['donationItems'];

    public string $logChannel = "donation";

    protected $casts = [
        'sender_branch_id' => 'string',
        'sender_user_id' => 'string',
        'receiver_branch_id' => 'string',
        'receiver_user_id' => 'string',
        'title' => 'string',
        'description' => 'string',
        'status' => DonationStatus::class,
        'sent_at' => 'datetime',
        'received_at' => 'datetime',
        'notes' => 'string',
    ];

    public function formattedSentAt(): Attribute
    {
        return new Attribute(
            get: fn () => $this->sent_at ? \Carbon\Carbon::parse($this->sent_at)->format('Y-m-d H:i') : null,
        );
    }

    public function formattedReceivedAt(): Attribute
    {
        return new Attribute(
            get: fn () => $this->received_at ? \Carbon\Carbon::parse($this->received_at)->format('Y-m-d H:i') : null,
        );
    }

    public function senderBranch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'sender_branch_id', 'id');
    }

    public function senderUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_user_id', 'id');
    }

    public function receiverBranch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'receiver_branch_id', 'id');
    }

    public function receiverUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_user_id', 'id');
    }

    public function donationItems(): HasMany {
        return $this->hasMany(DonationItem::class, 'donation_id', 'id');
    }
}
