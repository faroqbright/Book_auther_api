<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\AuthorRepository;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Repository\BookRepositoryInterface;
use App\Contracts\Repository\AuthorRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }

    public function boot()
    {
        //
    }
}
