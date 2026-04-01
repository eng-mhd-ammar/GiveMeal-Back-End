<?php

namespace Modules\Address\Repositories\V1;

use Modules\Address\Interfaces\V1\Address\AddressRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Address\Models\Address;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    protected $model = Address::class;

    public function allowedFilters(): array
    {
        return [
            // AllowedFilter::exact('institution', 'id'),
            // AllowedFilter::exact('owner', 'owner_id'),
            // AllowedFilter::exact('active', 'is_active'),
        ];
    }

    public function allowedIncludes(): array
    {
        return [
            // AllowedInclude::relationship('owner'),
            // AllowedInclude::relationship('branches'),
            // AllowedInclude::relationship('user_institutions', 'userAddresss'),
            // AllowedInclude::relationship('members'),
        ];
    }
}
