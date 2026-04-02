<?php

namespace Modules\Donation\Providers\DonationItem;

use Illuminate\Support\ServiceProvider;
use Modules\Donation\Interfaces\V1\DonationItem\DonationItemRepositoryInterface;
use Modules\Donation\Interfaces\V1\DonationItem\DonationItemServiceInterface;
use Modules\Donation\Repositories\V1\DonationItemRepository;
use Modules\Donation\Services\V1\DonationItemService;

class DonationItemServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(DonationItemRouteServiceProvider::class);

        $this->app->bind(DonationItemServiceInterface::class, DonationItemService::class);
        $this->app->bind(DonationItemRepositoryInterface::class, DonationItemRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
