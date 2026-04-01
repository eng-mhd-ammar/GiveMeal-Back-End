<?php

namespace Modules\Address\Repositories\V1;

use Modules\Address\Interfaces\V1\State\StateRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Address\Models\State;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

class StateRepository extends BaseRepository implements StateRepositoryInterface
{
    protected $model = State::class;

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
            // AllowedInclude::relationship('user_institutions', 'userStates'),
            // AllowedInclude::relationship('members'),
        ];
    }
}
