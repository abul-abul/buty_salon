<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\UserInterface',
            'App\Services\UserService'
        );
        $this->app->bind(
            'App\Contracts\SalonInterface',
            'App\Services\SalonService'
        );
        $this->app->bind(
            'App\Contracts\ServicesInterface',
            'App\Services\ServicesService'
        );
        $this->app->bind(
            'App\Contracts\AlbumInterface',
            'App\Services\AlbumService'
        );
        $this->app->bind(
            'App\Contracts\ImageInterface',
            'App\Services\ImageService'
        );
        $this->app->bind(
            'App\Contracts\PortfolioInterface',
            'App\Services\PortfolioService'
        );
        $this->app->bind(
            'App\Contracts\MessageInterface',
            'App\Services\MessageService'
        );
        $this->app->bind(
            'App\Contracts\SubscribeInterface',
            'App\Services\SubscribeService'
        );
        $this->app->bind(
            'App\Contracts\CategoryInterface',
            'App\Services\CategoryService'
        );
        $this->app->bind(
            'App\Contracts\NotificationInterface',
            'App\Services\NotificationService'
        );
        $this->app->bind(
            'App\Contracts\WorkersJobsInterface',
            'App\Services\WorkersJobsService'
        );
        $this->app->bind(
            'App\Contracts\ArticleInterface',
            'App\Services\ArticleService'
        );
        $this->app->bind(
            'App\Contracts\ArticleImagesInterface',
            'App\Services\ArticleImagesService'
        );
        $this->app->bind(
            'App\Contracts\PositionInterface',
            'App\Services\PositionService'
        );
        $this->app->bind(
            'App\Contracts\AddressInterface',
            'App\Services\AddressService'
        );
    }
}
