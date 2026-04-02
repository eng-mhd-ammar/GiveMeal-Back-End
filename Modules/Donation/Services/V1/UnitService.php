<?php

namespace Modules\Donation\Services\V1;

use Modules\Donation\Interfaces\V1\Unit\UnitRepositoryInterface;
use Modules\Donation\Interfaces\V1\Unit\UnitServiceInterface;
use Modules\Core\Services\BaseService;

class UnitService extends BaseService implements UnitServiceInterface
{
    public function __construct(protected UnitRepositoryInterface $repository)
    {
    }
}
