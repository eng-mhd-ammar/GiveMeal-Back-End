<?php

namespace Modules\Institution\Repositories\V1;

use Modules\Institution\Interfaces\V1\UserBranch\UserBranchRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Institution\Models\UserBranch;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

class UserBranchRepository extends BaseRepository implements UserBranchRepositoryInterface
{
    protected $model = UserBranch::class;

    public function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('user_branch', 'id'),
            AllowedFilter::exact('branch', 'branch_id'),
            AllowedFilter::exact('user', 'user_id'),
        ];
    }

    public function allowedIncludes(): array
    {
        return [
            AllowedInclude::relationship('branch.institution.owner'),
            AllowedInclude::relationship('user'),
        ];
    }
}
