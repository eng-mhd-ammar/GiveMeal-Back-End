<?php

namespace Modules\Address\Requests\V1\State;

use Illuminate\Foundation\Http\FormRequest;

class CreateStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
