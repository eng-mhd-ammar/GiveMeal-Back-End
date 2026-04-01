<?php

namespace Modules\Address\DTO\V1;

use Modules\Address\Requests\V1\Address\CreateAddressRequest;
use Modules\Address\Requests\V1\Address\UpdateAddressRequest;
use Modules\Core\DTO\BaseDTO;

class AddressDTO extends BaseDTO
{
    public function __construct(
        public ?string $branch_id,
        public ?string $state_id,
        public ?string $city,
        public ?string $street,
        public ?float $latitude,
        public ?float $longitude,
        public ?string $details,
    ) {
    }

    public static function fromRequest(CreateAddressRequest|UpdateAddressRequest $request): self
    {
        return new self(
            branch_id: $request->validated('branch_id'),
            state_id: $request->validated('state_id'),
            city: $request->validated('city'),
            street: $request->validated('street'),
            latitude: $request->validated('latitude'),
            longitude: $request->validated('longitude'),
            details: $request->validated('details'),
        );
    }
}
