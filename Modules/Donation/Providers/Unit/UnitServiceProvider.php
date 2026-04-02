<?php

namespace Modules\Donation\Providers\Unit;

use Illuminate\Support\ServiceProvider;
use Modules\Donation\Interfaces\V1\Unit\UnitRepositoryInterface;
use Modules\Donation\Interfaces\V1\Unit\UnitServiceInterface;
use Modules\Donation\Repositories\V1\UnitRepository;
use Modules\Donation\Services\V1\UnitService;

class UnitServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(UnitRouteServiceProvider::class);

        $this->app->bind(UnitServiceInterface::class, UnitService::class);
        $this->app->bind(UnitRepositoryInterface::class, UnitRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
