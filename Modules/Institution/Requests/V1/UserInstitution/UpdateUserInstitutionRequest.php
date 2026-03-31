<?php

namespace Modules\Institution\Requests\V1\UserInstitution;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Models\User;
use Modules\Core\Rules\EnumRule;
use Modules\Core\Rules\FileOrUrl;
use Modules\Core\Rules\NotSoftDeleted;
use Modules\Core\Rules\ProhibitedUnlessHasRole;
use Modules\Institution\Enums\BranchType;
use Modules\Institution\Models\Branch;
use Modules\Institution\Models\Institution;

class UpdateUserInstitutionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['string', new NotSoftDeleted(User::class)],
            'institution_id' => ['string', new NotSoftDeleted(Institution::class)],
            'is_admin' => ['boolean'],
        ];
    }
}
