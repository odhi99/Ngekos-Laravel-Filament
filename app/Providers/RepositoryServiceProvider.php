<?php

namespace App\Providers;

use App\interface\BoardingHouseRepositoryInterface;
use App\interface\CategoryRepositoryInterface;
use App\interface\LocationRepositoryInterface;
use App\Repositories\BoardingHosuseRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\LocationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BoardingHouseRepositoryInterface::class, BoardingHosuseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
