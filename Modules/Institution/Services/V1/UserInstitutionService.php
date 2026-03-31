<?php

namespace Modules\Institution\Services\V1;

use Modules\Institution\Interfaces\V1\UserInstitution\UserInstitutionRepositoryInterface;
use Modules\Institution\Interfaces\V1\UserInstitution\UserInstitutionServiceInterface;
use Modules\Core\Services\BaseService;

class UserInstitutionService extends BaseService implements UserInstitutionServiceInterface
{
    public function __construct(protected UserInstitutionRepositoryInterface $repository)
    {
    }
}
