<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Policies\BookPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\GenrePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Genre::class                 => GenrePolicy::class,
        Category::class              => CategoryPolicy::class,
        Book::class                  => BookPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
