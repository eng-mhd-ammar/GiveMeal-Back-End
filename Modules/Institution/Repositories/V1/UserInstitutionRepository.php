<?php

namespace Modules\Institution\Repositories\V1;

use Modules\Institution\Interfaces\V1\UserInstitution\UserInstitutionRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Institution\Models\UserInstitution;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

class UserInstitutionRepository extends BaseRepository implements UserInstitutionRepositoryInterface
{
    protected $model = UserInstitution::class;

    public function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('user_institution', 'id'),
            AllowedFilter::exact('institution', 'institution_id'),
            AllowedFilter::exact('user', 'user_id'),
        ];
    }

    public function allowedIncludes(): array
    {
        return [
            AllowedInclude::relationship('institution.owner'),
            AllowedInclude::relationship('user'),
        ];
    }
}
