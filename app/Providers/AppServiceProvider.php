<?php

namespace App\Providers;

use App\Models\Game;
use App\Models\Team;
use App\Observers\GameObserver;
use App\Observers\TeamObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Game::observe(GameObserver::class);
        Team::observe(TeamObserver::class);
    }
}
