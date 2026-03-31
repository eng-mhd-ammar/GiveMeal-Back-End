<?php

namespace Modules\Institution\Services\V1;

use Modules\Institution\Interfaces\V1\UserBranch\UserBranchRepositoryInterface;
use Modules\Institution\Interfaces\V1\UserBranch\UserBranchServiceInterface;
use Modules\Core\Services\BaseService;

class UserBranchService extends BaseService implements UserBranchServiceInterface
{
    public function __construct(protected UserBranchRepositoryInterface $repository)
    {
    }
}
