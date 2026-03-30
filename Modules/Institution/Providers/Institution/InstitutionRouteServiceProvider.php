<?php

namespace Modules\Institution\Providers\Institution;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Modules\Institution\Controllers\V1\InstitutionController;

class InstitutionRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function (): void {
            Route::middleware('api')
                ->controller(InstitutionController::class)
                ->prefix('api/v1/institution')
                ->name('institution.')
                ->group(__DIR__ . '/../../Routes/V1/institution.php');
        });
    }
}
