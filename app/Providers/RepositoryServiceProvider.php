<?php

namespace App\Providers;

use App\Entities\Repositories\AbstractRepositoryInterface;
use App\Entities\Repositories\AbstractRepository;
use App\Entities\Repositories\User\UserRepository;
use App\Entities\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AbstractRepositoryInterface::class, AbstractRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
    }
}
