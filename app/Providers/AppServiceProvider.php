<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
// use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        'App\Services\Interfaces\UserServiceInterface'=> 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface'=> 'App\Repositories\UserRepository',

        'App\Services\Interfaces\UserCatalogueServiceInterface'=> 'App\Services\UserCatalogueService',
        'App\Repositories\Interfaces\UserCatalogueRepositoryInterface'=> 'App\Repositories\UserCatalogueRepository',

        'App\Services\Interfaces\PostCatalogueServiceInterface'=> 'App\Services\PostCatalogueService',
        'App\Repositories\Interfaces\PostCatalogueRepositoryInterface'=> 'App\Repositories\PostCatalogueRepository',

        'App\Services\Interfaces\CatalogueServiceInterface'=> 'App\Services\CatalogueService',
        'App\Repositories\Interfaces\CatalogueRepositoryInterface'=> 'App\Repositories\CatalogueRepository',

        'App\Services\Interfaces\PermissionServiceInterface'=> 'App\Services\PermissionService',
        'App\Repositories\Interfaces\PermissionRepositoryInterface'=> 'App\Repositories\PermissionRepository',
       
        'App\Services\Interfaces\OrderAdminServiceInterface'=> 'App\Services\OrderAdminService',
        'App\Repositories\Interfaces\OrderAdminRepositoryInterface'=> 'App\Repositories\OrderAdminRepository',
       
        'App\Services\Interfaces\PostServiceInterface'=> 'App\Services\PostService',
        'App\Repositories\Interfaces\PostRepositoryInterface'=> 'App\Repositories\PostRepository',

        'App\Repositories\Interfaces\ProvinceRepositoryInterface'=> 'App\Repositories\ProvinceRepository',
        'App\Repositories\Interfaces\DistrictRepositoryInterface'=> 'App\Repositories\DistrictRepository',

        'App\Services\Interfaces\ProductServiceInterface'=> 'App\Services\ProductService',
        'App\Repositories\Interfaces\ProductRepositoryInterface'=> 'App\Repositories\ProductRepository',

     
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach($this->bindings as $key => $val) {
            $this->app->bind($key, $val);
        }

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
