<?php

namespace Modules\Auth\Repositories\V1;

use Modules\Auth\Interfaces\V1\Profile\ProfileRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Auth\Models\User;
use Spatie\QueryBuilder\AllowedInclude;

class ProfileRepository extends BaseRepository implements ProfileRepositoryInterface
{
    protected $model = User::class;

    public function allowedIncludes(): array
    {
        return [
            AllowedInclude::relationship('roles'),
            AllowedInclude::relationship('owned_institutions', 'ownedInstitutions'),
            AllowedInclude::relationship('member_institutions', 'memberInstitutions'),
            AllowedInclude::relationship('user_branches', 'userBranches'),
            AllowedInclude::relationship('branches'),
        ];
    }
}
