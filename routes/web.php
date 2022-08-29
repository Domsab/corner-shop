<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ShoppingBagController;

use App\Http\Controllers\Dashboard\CollectionProductsController;
use App\Http\Controllers\Dashboard\ProductController as DashboardProductController;
use App\Http\Controllers\Dashboard\CategoryController as DashboardCategoryController;
use App\Http\Controllers\Dashboard\SettingsController as DashboardSettingsController;
use App\Http\Controllers\Dashboard\AttributeController as DashboardAttributeController;
use App\Http\Controllers\Dashboard\CollectionController as DashboardCollectionController;
use App\Http\Controllers\Dashboard\AttributeValueController as DashboardAttributeValueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/navigation')
    ->group(function () {
        Route::get('', [NavigationController::class, 'index'])->name('store.navigation.index');
    });

Route::prefix('/catalog')
    ->group(function () {
        Route::get('/{categorySlug}', [CatalogController::class, 'show'])->name('store.catalog.show');
    });

Route::prefix('/products')
    ->group(function () {
        Route::get('', [ProductsController::class, 'index'])->name('store.products.index');
        Route::get('/{productSlug}', [ProductsController::class, 'show'])->name('store.products.show');
    });

    Route::prefix('/shopping-bag')
    ->group(function () {
        Route::get('', [ShoppingBagController::class, 'index']);

        Route::post('', [ShoppingBagController::class, 'store']);
        Route::delete('/all-items', [ShoppingBagController::class, 'remove']);
        Route::delete('/{id}', [ShoppingBagController::class, 'remove']);
    });

Route::middleware('auth')
    ->prefix('/checkout-payment')
    ->group(function () {
        Route::get('', [CheckoutController::class, 'show'])->name('checkout.index');
        Route::post('/order', [CheckoutController::class, 'create'])->name('checkout.place.order');
    });

Route::middleware('auth')
    ->prefix('/admin')
    ->group(function () {
        Route::get('/settings', [DashboardSettingsController::class, 'index'])->name('json.dashboard.settings');
        Route::post('/settings', [DashboardSettingsController::class,'update'])->name('dashboard.settings.update');

        Route::group(['prefix' => 'collections'], function () {
            Route::get('', [DashboardCollectionController::class,'index'])->name('dashboard.collections.index');
            Route::get('/{id}', [DashboardCollectionController::class,'show'])->name('dashboard.collections.show');
            Route::get('/create', [DashboardCollectionController::class,'create'])->name('dashboard.collections.create');
            Route::get('/{id}/edit', [DashboardCollectionController::class,'edit'])->name('dashboard.collections.edit');

            Route::post('', [DashboardCollectionController::class,'store'])->name('dashboard.collections.store');
            Route::post('/{id}', [DashboardCollectionController::class,'update'])->name('dashboard.collections.update');
            Route::delete('/{id}', [DashboardCollectionController::class,'delete'])->name('dashboard.collections.delete');

            Route::get('{id}/products/', [CollectionProductsController::class,'show'])->name('dashboard.collection.show');
        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('', [DashboardCategoryController::class,'index'])->name('dashboard.categories.index');
            Route::get('/{id}', [DashboardCategoryController::class,'edit'])->name('dashboard.categories.show');
            Route::get('/create', [DashboardCategoryController::class,'create'])->name('dashboard.categories.create');
            Route::get('/{id}/edit', [DashboardCategoryController::class,'delete'])->name('dashboard.categories.edit');

            Route::post('', [DashboardCategoryController::class,'store'])->name('dashboard.categories.store');
            Route::post('/{id}', [DashboardCategoryController::class,'update'])->name('dashboard.categories.update');
            Route::delete('/{id}', [DashboardCategoryController::class,'update'])->name('dashboard.categories.delete');

            Route::group(['prefix' => 'products'], function () {
                Route::get('', [DashboardCategoryController::class,'index'])->name('dashboard.categories.index');
                Route::get('/create', [DashboardCategoryController::class,'create'])->name('dashboard.categories.create');
                Route::get('/{id}', [DashboardCategoryController::class,'edit'])->name('dashboard.categories.show');
                Route::get('/{id}/edit', [DashboardCategoryController::class,'delete'])->name('dashboard.categories.edit');
            });
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('', [DashboardProductController::class, 'index'])->name('dashboard.products.index');
            Route::get('/create', [DashboardProductController::class, 'create'])->name('dashboard.products.create');
            Route::get('/{id}', [DashboardProductController::class, 'edit'])->name('dashboard.products.show');
            Route::get('/{id}/edit', [DashboardProductController::class, 'edit'])->name('dashboard.products.edit');

            Route::post('', [DashboardProductController::class, 'store'])->name('dashboard.products.store');
            Route::post('/{id}', [DashboardProductController::class, 'update'])->name('dashboard.products.update');
            Route::delete('/{id}', [DashboardProductController::class, 'update'])->name('dashboard.products.delete');

            Route::group(['prefix' => 'images'], function () {
                Route::post('/upload', [ProductImageController::class, 'upload'])->name('dashboard.products.images.upload');
                Route::get('/{id}/delete', [ProductImageController::class, 'delete'])->name('dashboard.products.images.delete');
            });

            Route::group(['prefix' => 'attributes'], function () {
                Route::get('/load', [ProductAttributeController::class, 'loadAttributes']);
                Route::post('', [ProductAttributeController::class, 'productAttributes']);
                Route::post('/values', [ProductAttributeController::class, 'loadValues']);
                Route::post('/add', [ProductAttributeController::class, 'addAttribute']);
                Route::post('/delete', [ProductAttributeController::class, 'deleteAttribute']);
            });
        });

        Route::group(['prefix' => 'attributes'], function () {
            Route::get('', [DashboardAttributeController::class, 'index'])->name('dashboard.attributes.index');
            Route::get('/create', [DashboardAttributeController::class, 'create'])->name('dashboard.attributes.create');
            Route::get('/{id}/edit', [DashboardAttributeController::class, 'edit'])->name('dashboard.attributes.edit');
            Route::get('/{id}/delete', [DashboardAttributeController::class, 'delete'])->name('dashboard.attributes.delete');
            Route::post('/store', [DashboardAttributeController::class, 'store'])->name('dashboard.attributes.store');
            Route::post('/update', [DashboardAttributeController::class, 'update'])->name('dashboard.attributes.update');

            Route::group(['prefix' => 'values'], function () {
                Route::post('/get', [DashboardAttributeValueController::class, 'getValues']);
                Route::post('/store', [DashboardAttributeValueController::class, 'addValues']);
                Route::post('/update', [DashboardAttributeValueController::class, 'updateValues']);
                Route::post('/delete', [DashboardAttributeValueController::class, 'deleteValues']);
            });
        });

    });

Route::middleware('auth')
    ->prefix('/account')
    ->group(function () {

    });

require __DIR__.'/auth.php';

Route::get('/{any}', function () {
    return view('welcome', [
        'auth_user' => Auth::user()
    ]);
})->where("any", ".*");
