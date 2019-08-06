<?php

namespace Intrasocial\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\Intrasocial\Repositories\UserRepository::class, \Intrasocial\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\Intrasocial\Repositories\PostRepository::class, \Intrasocial\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\Intrasocial\Repositories\ComentRepository::class, \Intrasocial\Repositories\ComentRepositoryEloquent::class);
        //:end-bindings:
    }
}
