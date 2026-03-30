<?php

namespace Modules\Auth\Requests\V1\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Enums\Gender;
use Modules\Auth\Models\User;
use Modules\Core\Rules\EnumRule;
use Modules\Core\Rules\FileOrUrl;
use Modules\Core\Rules\UniqueNotDeleted;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'avatar' => [new FileOrUrl(['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff', 'tif', 'webp', 'heic', 'heif', 'svg'])],
            'first_name' => ['string'],
            'last_name' => ['string'],
            'username' => ['string', new UniqueNotDeleted(User::class, 'username', Auth::guard('api')->id())],
            'birthday' => ['date'],
            // 'phone' => ['string', new UniqueNotDeleted(User::class, 'phone'), 'regex:/^\+9639\d{8}$/'],
            // 'email' => ['email', new UniqueNotDeleted(User::class, 'email')],
            'password' => ['string', 'min:8', 'max:20'],
            'gender' => ['integer', new EnumRule(Gender::class), 'default:1'],
        ];
    }
}
