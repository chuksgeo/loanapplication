<?php

namespace App\Providers;

use App\Contracts\PartnerApplicationInterface;
use App\Services\AlphaApplicationService;
use App\Services\BetaApplicationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(PartnerApplicationInterface::class, function () {
        $partner = request()->header('X-PARTNER-ID'); // You could also resolve from DB, auth user, etc.

        return match ($partner) {
            'alpha' => new AlphaApplicationService(),
            'beta' => new BetaApplicationService(),
            default => throw new \InvalidArgumentException("Unsupported partner: {$partner}")
        };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
