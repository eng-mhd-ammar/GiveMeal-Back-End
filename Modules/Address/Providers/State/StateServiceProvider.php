<?php

namespace Modules\Address\Providers\State;

use Illuminate\Support\ServiceProvider;
use Modules\Address\Interfaces\V1\State\StateRepositoryInterface;
use Modules\Address\Interfaces\V1\State\StateServiceInterface;
use Modules\Address\Repositories\V1\StateRepository;
use Modules\Address\Services\V1\StateService;

class StateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(StateRouteServiceProvider::class);

        $this->app->bind(StateServiceInterface::class, StateService::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
