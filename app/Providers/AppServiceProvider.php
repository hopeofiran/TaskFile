<?php

namespace App\Providers;

use App\Contracts\FolderRepositoryInterface;
use App\Repositories\FolderRepository;
use App\Services\FolderService;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FolderRepositoryInterface::class, FolderRepository::class);
        $this->app->bind(FolderService::class, function ($app) {
            return new FolderService($app->make(FolderRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(config('app.default_max_string_length'));
    }
}
