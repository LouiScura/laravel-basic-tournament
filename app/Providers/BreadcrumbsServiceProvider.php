<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Breadcrumbs::for('players.index', fn (Trail $trail) =>
            $trail->push('Players', route('players.index'))
        );

        Breadcrumbs::for('teams.index', fn (Trail $trail) =>
            $trail->push('Teams', route('teams.index'))
        );

        Breadcrumbs::for('teams.create', fn (Trail $trail) =>
            $trail
                ->parent('teams.index', route('teams.index'))
                ->push('Add team', route('teams.create'))
        );

        Breadcrumbs::for('teams.edit', fn (Trail $trail, $team) =>
            $trail
                ->parent('teams.index', route('teams.index'))
                ->push('Update team', route('teams.edit', $team))
        );
    }
}
