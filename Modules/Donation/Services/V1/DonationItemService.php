<?php

namespace Modules\Donation\Services\V1;

use Modules\Donation\Interfaces\V1\DonationItem\DonationItemRepositoryInterface;
use Modules\Donation\Interfaces\V1\DonationItem\DonationItemServiceInterface;
use Modules\Core\Services\BaseService;

class DonationItemService extends BaseService implements DonationItemServiceInterface
{
    public function __construct(protected DonationItemRepositoryInterface $repository)
    {
    }
}
