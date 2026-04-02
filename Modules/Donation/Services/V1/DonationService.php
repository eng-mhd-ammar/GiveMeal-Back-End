<?php

namespace Modules\Donation\Services\V1;

use Modules\Donation\Interfaces\V1\Donation\DonationRepositoryInterface;
use Modules\Donation\Interfaces\V1\Donation\DonationServiceInterface;
use Modules\Core\Services\BaseService;

class DonationService extends BaseService implements DonationServiceInterface
{
    public function __construct(protected DonationRepositoryInterface $repository)
    {
    }
}
