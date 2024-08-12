<?php

use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PostCatalogueController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\CatalogueController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ErrorController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\OrderAdminController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Frontend\CartController;

use App\Http\Controllers\Frontend\OrderController;

use App\Http\Controllers\Frontend\UserSubscriberController;

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Route;




/** BACKEND ROUTES */

Route::group(['middleware' => ['admin']], function() {
    
    // DASHBOARD
    Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');


    // USER 
    Route::group(['prefix' => 'user'], function() {
        Route::get('index', [UserController::class, 'index'])->name('user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::get('{id}/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::post('{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    });



    // USER-CATALOGUE
    Route::group(['prefix' => 'user/catalogue'], function() {
        Route::get('index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
        Route::get('create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create');
        Route::post('store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store');
        Route::get('{id}/edit', [UserCatalogueController::class, 'edit'])->name('user.catalogue.edit');
        Route::post('{id}/update', [UserCatalogueController::class, 'update'])->name('user.catalogue.update');
        Route::get('{id}/delete', [UserCatalogueController::class, 'delete'])->name('user.catalogue.delete');
        Route::post('{id}/destroy', [UserCatalogueController::class, 'destroy'])->name('user.catalogue.destroy');
        Route::get('permission', [UserCatalogueController::class, 'permission'])->name('user.catalogue.permission');
        Route::post('updatePermission', [UserCatalogueController::class, 'updatePermission'])->name('user.catalogue.updatePermission');


    });

    // POST-CATALOUGE
    Route::group(['prefix' => 'post/catalogue'], function() {
        Route::get('index', [PostCatalogueController::class, 'index'])->name('post.catalogue.index');
        Route::get('create', [PostCatalogueController::class, 'create'])->name('post.catalogue.create');
        Route::post('store', [PostCatalogueController::class, 'store'])->name('post.catalogue.store');
        Route::get('{id}/edit', [PostCatalogueController::class, 'edit'])->name('post.catalogue.edit');
        Route::post('{id}/update', [PostCatalogueController::class, 'update'])->name('post.catalogue.update');
        Route::get('{id}/delete', [PostCatalogueController::class, 'delete'])->name('post.catalogue.delete');
        Route::post('{id}/destroy', [PostCatalogueController::class, 'destroy'])->name('post.catalogue.destroy');

    });

    // POST
    Route::group(['prefix' => 'post'], function() {
        Route::get('index', [PostController::class, 'index'])->name('post.index');
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('store', [PostController::class, 'store'])->name('post.store');
        Route::get('{id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::post('{id}/update', [PostController::class, 'update'])->name('post.update');
        Route::get('{id}/delete', [PostController::class, 'delete'])->name('post.delete');
        Route::post('{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

    });


    // PERMISSION
    Route::group(['prefix' => 'permission'], function() {
        Route::get('index', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('{id}/update', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('{id}/delete', [PermissionController::class, 'delete'])->name('permission.delete');
        Route::post('{id}/destroy', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });



    // CATEGORY-------------------
    Route::group(['prefix' => 'catalogue'], function() {
        Route::get('index', [CatalogueController::class, 'index'])->name('catalogue.index');
        Route::get('create', [CatalogueController::class, 'create'])->name('catalogue.create');
        Route::post('store', [CatalogueController::class, 'store'])->name('catalogue.store');
        Route::get('{id}/edit', [CatalogueController::class, 'edit'])->name('catalogue.edit');
        Route::post('{id}/update', [CatalogueController::class, 'update'])->name('catalogue.update');
        Route::get('{id}/delete', [CatalogueController::class, 'delete'])->name('catalogue.delete');
        Route::post('{id}/destroy', [CatalogueController::class, 'destroy'])->name('catalogue.destroy');
    });


    //PRODUCT ----------------

    Route::group(['prefix' => 'product'], function() {
        Route::get('index', [ProductController::class, 'index'])->name('product.index');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('{id}/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
        Route::post('{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    });

 
    // BANNER 
    Route::group(['prefix' => 'banner'], function() {
        Route::get('index', [BannerController::class, 'index'])->name('banner.index');
        Route::get('create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('{id}/update', [BannerController::class, 'update'])->name('banner.update');
        Route::get('{id}/delete', [BannerController::class, 'delete'])->name('banner.delete');
        Route::post('{id}/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');
    });


    // SUBSCRIBER
    Route::group(['prefix' => 'subscriber'], function() {
        Route::get('index', [SubscriberController::class, 'index'])->name('subscriber.index');
        Route::get('create', [SubscriberController::class, 'create'])->name('subscriber.create');
        Route::post('store', [SubscriberController::class, 'store'])->name('subscriber.store');
        Route::get('{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.edit');
        Route::post('{id}/update', [SubscriberController::class, 'update'])->name('subscriber.update');
        Route::get('{id}/delete', [SubscriberController::class, 'delete'])->name('subscriber.delete');
        Route::post('{id}/destroy', [SubscriberController::class, 'destroy'])->name('subscriber.destroy');
    });

    // ORDER
    Route::group(['prefix' => 'order'], function() {
        Route::get('index', [OrderAdminController::class, 'index'])->name('order.index');
        Route::get('{id}/show', [OrderAdminController::class, 'show'])->name('order.show');
        Route::get('create', [OrderAdminController::class, 'create'])->name('order.create');
        Route::post('store', [OrderAdminController::class, 'store'])->name('order.store');
        Route::get('{id}/edit', [OrderAdminController::class, 'edit'])->name('order.edit');
        Route::post('{id}/update', [OrderAdminController::class, 'update'])->name('order.update');
        Route::get('{id}/delete', [OrderAdminController::class, 'delete'])->name('order.delete');
        Route::post('{id}/destroy', [OrderAdminController::class, 'destroy'])->name('order.destroy');
    });
    // Route::group(['prefix' => 'order_detail'], function() {
    //     Route::get('index', [OrderDetailAdminController::class, 'index'])->name('order.detail.index');
    //     Route::get('create', [OrderDetailAdminController::class, 'create'])->name('order.detail.create');
    //     Route::post('store', [OrderDetailAdminController::class, 'store'])->name('order.detail.store');
    //     Route::get('{id}/edit', [OrderDetailAdminController::class, 'edit'])->name('order.detail.edit');
    //     Route::post('{id}/update', [OrderDetailAdminController::class, 'update'])->name('order.detail.update');
    //     Route::get('{id}/delete', [OrderDetailAdminController::class, 'delete'])->name('order.detail.delete');
    //     Route::post('{id}/destroy', [OrderDetailAdminController::class, 'destroy'])->name('order.detail.destroy');
    // });



    // 403
    Route::get('403', [ErrorController::class, 'unauthorize'])->name('403.index');

});



// LOGIN ADMIN

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login')->middleware('login');



// AJAX ADMIN
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index')->middleware('admin');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus')->middleware('admin');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll')->middleware('admin');





// FRONTEND 
Route::get('/', [FrontendController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'frontend'], function() {
        
    Route::get('/about', [FrontendController::class, 'about'])->name('about.index');
    Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact.index');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('blog.index');
    Route::get('/product-detail', [FrontendController::class, 'product_detail'])->name('product-detail.index');
    
    
    
    
    // Controller riêng

    // CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');



    // SHOP

    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');



    // ORDER

    Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');


    // ACCOUNT
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'Userlogin']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'UserRegister']);
    // Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    

    //Subscriber
    Route::post('/subscriber', [UserSubscriberController::class, 'subscriber'])->name('user.subscriber');
    Route::post('/unsubscriber', [UserSubscriberController::class, 'unsubscriber'])->name('user.unsubscriber');

    //productdetail
    // Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    
});