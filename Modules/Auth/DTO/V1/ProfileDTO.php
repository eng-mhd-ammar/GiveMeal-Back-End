<?php

namespace Modules\Auth\DTO\V1;

use Carbon\Carbon;
use Modules\Address\DTO\V1\AddressDTO;
use Modules\Auth\Requests\V1\Profile\UpdateProfileRequest;
use Modules\Core\DTO\BaseDTO;

class ProfileDTO extends BaseDTO
{
    public function __construct(
        public ?string $avatar,
        public ?string $first_name,
        public ?string $last_name,
        public ?string $username,
        public ?string $phone,
        public ?string $email,
        public ?string $password,
        public ?Carbon $birthday,
        public ?bool $gender,
    ) {
    }

    public static function fromRequest(UpdateProfileRequest $request): self
    {
        return new self(
            avatar: self::handleFileStoring($request->validated('avatar'), '/avatars'),
            first_name: $request->validated('first_name'),
            last_name: $request->validated('last_name'),
            username: $request->validated('username'),
            phone: $request->validated('phone'),
            email: $request->validated('email'),
            password: $request->validated('password'),
            birthday: Carbon::parse($request->validated('birthday')),
            gender: $request->validated('gender'),
        );
    }
}
