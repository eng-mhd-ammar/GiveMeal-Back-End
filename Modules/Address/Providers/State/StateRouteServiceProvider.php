<?php

namespace Modules\Address\Providers\State;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Modules\Address\Controllers\V1\StateController;

class StateRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function (): void {
            Route::middleware('api')
                ->controller(StateController::class)
                ->prefix('api/v1/state')
                ->name('state.')
                ->group(__DIR__ . '/../../Routes/V1/state.php');
        });
    }
}
