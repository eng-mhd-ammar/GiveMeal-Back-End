<?php

namespace Modules\Auth\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Institution\Resources\V1\InstitutionResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'avatar' => $this->avatar,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'phone' => $this->phone,
            'email' => $this->email,
            'birthday' => \Carbon\Carbon::parse($this->birthday)->format('Y-m-d'),
            'gender' => $this->gender,

            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'institutions' => InstitutionResource::collection($this->whenLoaded('institutions')),
        ];
    }
}
