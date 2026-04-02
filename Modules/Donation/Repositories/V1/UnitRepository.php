<?php

namespace Modules\Donation\Repositories\V1;

use Modules\Donation\Interfaces\V1\Unit\UnitRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Donation\Models\Unit;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;

class UnitRepository extends BaseRepository implements UnitRepositoryInterface
{
    protected $model = Unit::class;

    public function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('unit', 'id'),
        ];
    }

    public function allowedIncludes(): array
    {
        return [
            AllowedInclude::relationship('donation_item.donation.sender_user', 'DonationItems.donation.senderUser'),
            AllowedInclude::relationship('donation_item.donation.receiver_user', 'DonationItems.donation.receiverUser'),
            AllowedInclude::relationship('donation_item.donation.sender_branch.institution', 'DonationItems.donation.senderBranch.institution'),
            AllowedInclude::relationship('donation_item.donation.receiver_branch.institution', 'DonationItems.donation.receiverBranch.institution'),
        ];
    }
}
