<?php

namespace App\Providers;

use App\Services\BookCreateService;
use Illuminate\Support\ServiceProvider;

class IsbnDbProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BookCreateService::class, function () {
            $token = config('services.isbndb.token');

            return new BookCreateService($token);
        });
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
