<?php

namespace App\Providers;

use App\Http\Repositories\FoodRepository;
use App\Http\Repositories\Interfaces\FoodRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(FoodRepositoryInterface::class, FoodRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
