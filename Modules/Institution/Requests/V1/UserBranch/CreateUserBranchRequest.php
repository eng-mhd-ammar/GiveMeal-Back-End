<?php

namespace Modules\Institution\Requests\V1\UserBranch;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Models\User;
use Modules\Core\Rules\ProhibitedUnlessHasRole;
use Modules\Core\Rules\EnumRule;
use Modules\Core\Rules\FileOrUrl;
use Modules\Core\Rules\NotSoftDeleted;
use Modules\Institution\Enums\UserBranchType;
use Modules\Institution\Models\Branch;
use Modules\Institution\Models\Institution;

class CreateUserBranchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'string', new NotSoftDeleted(User::class)],
            'branch_id' => ['required', 'string', new NotSoftDeleted(Branch::class)],
            'is_admin' => ['boolean', 'default:0'],
        ];
    }
}
