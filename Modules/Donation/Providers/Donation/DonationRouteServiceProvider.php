<?php

namespace Modules\Donation\Providers\Donation;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Modules\Donation\Controllers\V1\DonationController;

class DonationRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function (): void {
            Route::middleware('api')
                ->controller(DonationController::class)
                ->prefix('api/v1/donation')
                ->name('donation.')
                ->group(__DIR__ . '/../../Routes/V1/donation.php');
        });
    }
}
