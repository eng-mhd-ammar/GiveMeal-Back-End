<?php

namespace Modules\Institution\Providers\UserInstitution;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Modules\Institution\Controllers\V1\UserInstitutionController;

class UserInstitutionRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function (): void {
            Route::middleware('api')
                ->controller(UserInstitutionController::class)
                ->prefix('api/v1/user-institution')
                ->name('user-institution.')
                ->group(__DIR__ . '/../../Routes/V1/user-institution.php');
        });
    }
}
