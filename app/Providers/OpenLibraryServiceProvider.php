<?php

namespace App\Providers;

use App\Services\OpenLibraryService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class OpenLibraryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(OpenLibraryService::class, function ($app) {

            // setting default options for Open Library API calls
            // certification verification is turned off due to local environment.
            $client = Http::baseUrl(config('services.openlibrary.baseUri'))
                ->withOptions(['verify' => false]);

            // open library service
            return new OpenLibraryService($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
    }
}
