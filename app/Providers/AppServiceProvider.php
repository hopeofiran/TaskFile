<?php

namespace App\Providers;

use App\Contracts\FolderRepositoryInterface;
use App\Repositories\FolderRepository;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        FolderRepositoryInterface::class => FolderRepository::class,
    ];
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
        Schema::defaultStringLength(config('app.default_max_string_length'));
    }
}
