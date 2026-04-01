<?php

namespace Modules\Address\Providers\Address;

use Illuminate\Support\ServiceProvider;
use Modules\Address\Interfaces\V1\Address\AddressRepositoryInterface;
use Modules\Address\Interfaces\V1\Address\AddressServiceInterface;
use Modules\Address\Repositories\V1\AddressRepository;
use Modules\Address\Services\V1\AddressService;
use Modules\Address\Providers\State\StateServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(AddressRouteServiceProvider::class);

        $this->app->bind(AddressServiceInterface::class, AddressService::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);

        $this->app->register(StateServiceProvider::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../Database/migrations");
        $this->loadViewsFrom(__DIR__ . "/../../Views", 'address');
    }
}
