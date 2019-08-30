<?php

namespace App\Providers;

use App\Http\Repositories as Repositories;
use App\Http\Services as Services;

use Illuminate\Support\ServiceProvider;

class DependencyInjectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
        $this->registerRepositories();
    }

    private function registerRepositories()
    {
        $repositories = [
            Repositories\Interfaces\FoodRepositoryInterface::class => Repositories\FoodRepository::class
        ];

        foreach ($repositories as $interface => $implement) {
            $this->app->bind($interface, $implement);
        }
    }

    private function registerServices()
    {
        $services = [
            Services\Interfaces\LineServiceInterface::class => Services\LineService::class
        ];

        foreach ($services as $interface => $implement) {
            $this->app->bind($interface, $implement);
        }
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
