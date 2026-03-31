<?php

namespace Modules\Institution\Requests\V1\UserBranch;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Models\User;
use Modules\Core\Rules\EnumRule;
use Modules\Core\Rules\FileOrUrl;
use Modules\Core\Rules\NotSoftDeleted;
use Modules\Core\Rules\ProhibitedUnlessHasRole;
use Modules\Institution\Enums\BranchType;
use Modules\Institution\Models\Branch;
use Modules\Institution\Models\Institution;

class UpdateUserBranchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['string', new NotSoftDeleted(User::class)],
            'branch_id' => ['string', new NotSoftDeleted(Branch::class)],
            'is_admin' => ['boolean'],
        ];
    }
}
