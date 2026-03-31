<?php

namespace Modules\Institution\Providers\UserBranch;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Modules\Institution\Controllers\V1\UserBranchController;

class UserBranchRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function (): void {
            Route::middleware('api')
                ->controller(UserBranchController::class)
                ->prefix('api/v1/user-branch')
                ->name('user-branch.')
                ->group(__DIR__ . '/../../Routes/V1/user-branch.php');
        });
    }
}
