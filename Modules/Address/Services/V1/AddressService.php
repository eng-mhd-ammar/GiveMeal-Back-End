<?php

namespace Modules\Address\Services\V1;

use Modules\Address\Interfaces\V1\Address\AddressRepositoryInterface;
use Modules\Address\Interfaces\V1\Address\AddressServiceInterface;
use Modules\Core\Services\BaseService;

class AddressService extends BaseService implements AddressServiceInterface
{
    public function __construct(protected AddressRepositoryInterface $repository)
    {
    }
}
