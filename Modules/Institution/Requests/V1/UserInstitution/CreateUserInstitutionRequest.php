<?php

namespace Modules\Institution\Requests\V1\UserInstitution;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Models\User;
use Modules\Core\Rules\ProhibitedUnlessHasRole;
use Modules\Core\Rules\EnumRule;
use Modules\Core\Rules\FileOrUrl;
use Modules\Core\Rules\NotSoftDeleted;
use Modules\Institution\Enums\UserInstitutionType;
use Modules\Institution\Models\Branch;
use Modules\Institution\Models\Institution;

class CreateUserInstitutionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'string', new NotSoftDeleted(User::class)],
            'institution_id' => ['required', 'string', new NotSoftDeleted(Institution::class)],
            'is_admin' => ['boolean', 'default:0'],
        ];
    }
}
