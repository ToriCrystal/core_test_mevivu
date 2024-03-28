<?php

namespace App\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Admin\Repositories\Post\PostRepository;
use App\Admin\Services\Post\PostService;
use App\Admin\Services\Post\PostServiceInterface;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Admin\Services\Employee\EmployeeService;
use App\Admin\Services\Employee\EmployeeServiceInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        PostRepositoryInterface::class => PostRepository::class,
        EmployeeRepositoryInterface::class => 'App\Admin\Repositories\Employee\EmployeeRepository',
        'App\Admin\Repositories\Admin\AdminRepositoryInterface' => 'App\Admin\Repositories\Admin\AdminRepository',
        'App\Admin\Repositories\User\UserRepositoryInterface' => 'App\Admin\Repositories\User\UserRepository',
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {        
        $this->app->singleton(PostServiceInterface::class, PostService::class);
        $this->app->singleton(EmployeeServiceInterface::class, EmployeeService::class);
        foreach ($this->repositories as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
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
