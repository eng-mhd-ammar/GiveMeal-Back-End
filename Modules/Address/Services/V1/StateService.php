<?php

namespace Modules\Address\Services\V1;

use Modules\Address\Interfaces\V1\State\StateRepositoryInterface;
use Modules\Address\Interfaces\V1\State\StateServiceInterface;
use Modules\Core\Services\BaseService;

class StateService extends BaseService implements StateServiceInterface
{
    public function __construct(protected StateRepositoryInterface $repository)
    {
    }
}
