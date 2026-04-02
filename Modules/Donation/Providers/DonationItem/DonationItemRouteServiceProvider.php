<?php

namespace Modules\Donation\Providers\DonationItem;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Modules\Donation\Controllers\V1\DonationItemController;

class DonationItemRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function (): void {
            Route::middleware('api')
                ->controller(DonationItemController::class)
                ->prefix('api/v1/donation-item')
                ->name('donation-item.')
                ->group(__DIR__ . '/../../Routes/V1/donation-item.php');
        });
    }
}
