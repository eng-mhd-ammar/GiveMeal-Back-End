<?php

namespace Modules\Donation\Requests\V1\Donation;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Models\User;
use Modules\Core\Rules\EnumRule;
use Modules\Core\Rules\FileOrUrl;
use Modules\Core\Rules\NotSoftDeleted;
use Modules\Core\Rules\ProhibitedUnlessHasRole;
use Modules\Donation\Enums\DonationType;
use Modules\Institution\Models\Branch;
use Modules\Donation\Models\State;

class UpdateDonationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sender_branch_id' => ['string', new NotSoftDeleted(Branch::class)],
            'receiver_branch_id' => ['string', new NotSoftDeleted(Branch::class)],

            'sender_user_id' => ['string', new NotSoftDeleted(User::class)],
            'receiver_user_id' => ['string', new NotSoftDeleted(User::class)],

            'title' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
            'status' => ['numeric', new EnumRule(DonationStatus::class), 'default:' . DonationStatus::PENDING->value],
            'sent_at' => ['nullable', 'date'],
            'received_at' => ['nullable', 'date', 'after_or_equal:sent_at'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
