<?php

namespace Modules\Institution\Providers\Institution;

use Illuminate\Support\ServiceProvider;
use Modules\Institution\Providers\Branch\BranchServiceProvider;
use Modules\Institution\Interfaces\V1\Institution\InstitutionRepositoryInterface;
use Modules\Institution\Interfaces\V1\Institution\InstitutionServiceInterface;
use Modules\Institution\Repositories\V1\InstitutionRepository;
use Modules\Institution\Services\V1\InstitutionService;
use Modules\Institution\Providers\UserBranch\UserBranchServiceProvider;
use Modules\Institution\Providers\UserInstitution\UserInstitutionServiceProvider;

class InstitutionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(InstitutionRouteServiceProvider::class);

        $this->app->bind(InstitutionServiceInterface::class, InstitutionService::class);
        $this->app->bind(InstitutionRepositoryInterface::class, InstitutionRepository::class);

        $this->app->register(BranchServiceProvider::class);
        $this->app->register(UserBranchServiceProvider::class);
        $this->app->register(UserInstitutionServiceProvider::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../Database/migrations");
        $this->loadViewsFrom(__DIR__ . "/../../Views", 'institution');
    }
}
