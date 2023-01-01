<?php

namespace App\Providers;

use App\Models\Holder;
use App\Models\Role;
use App\Observers\HolderObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Holder::observe(HolderObserver::class);
    }
}
