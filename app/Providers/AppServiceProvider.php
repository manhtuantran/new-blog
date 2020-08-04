<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Interfaces\EloquenInterface;
use App\Interfaces\PostInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\EloquentRepository;
use App\Repositories\PostRepository;
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
        $this->app->bind(EloquenInterface::class, EloquentRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
