<?php

namespace Modules\Donation\Providers\Unit;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Modules\Donation\Controllers\V1\UnitController;

class UnitRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function (): void {
            Route::middleware('api')
                ->controller(UnitController::class)
                ->prefix('api/v1/unit')
                ->name('unit.')
                ->group(__DIR__ . '/../../Routes/V1/unit.php');
        });
    }
}
