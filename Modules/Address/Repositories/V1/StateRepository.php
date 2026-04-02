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
            AllowedFilter::exact('state', 'id'),
        ];
    }

    public function allowedIncludes(): array
    {
        return [
            AllowedInclude::relationship('addresses.branch.institution'),
        ];
    }
}
