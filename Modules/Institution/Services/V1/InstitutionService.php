<?php

namespace Modules\Institution\Services\V1;

use Modules\Institution\Interfaces\V1\Institution\InstitutionRepositoryInterface;
use Modules\Institution\Interfaces\V1\Institution\InstitutionServiceInterface;
use Modules\Core\Services\BaseService;

class InstitutionService extends BaseService implements InstitutionServiceInterface
{
    public function __construct(protected InstitutionRepositoryInterface $repository)
    {
    }
}
