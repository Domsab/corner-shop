<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\ProductController as DashboardProductController;
use App\Http\Controllers\Dashboard\CategoryController as DashboardCategoryController;
use App\Http\Controllers\Dashboard\SettingsController as DashboardSettingsController;
use App\Http\Controllers\Dashboard\AttributeController as DashboardAttributeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/categories')
    ->group(function() {

        Route::get('/', [CategoryController::class,'index'])->name('store.categories.index');

});


Route::middleware('auth')->prefix('/dashboard')
    ->group(function () {

        Route::get('/', function () { return view('dashboard'); })->name('dashboard');

        Route::get('/settings', [DashboardSettingsController::class, 'index'])->name('json.dashboard.settings');
        Route::post('/settings', [DashboardSettingsController::class,'update'])->name('dashboard.settings.update');

        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', [DashboardCategoryController::class,'index'])->name('dashboard.categories.index');
            Route::get('/create', [DashboardCategoryController::class,'create'])->name('dashboard.categories.create');
            Route::get('/{id}/edit', [DashboardCategoryController::class,'edit'])->name('dashboard.categories.edit');
            Route::get('/{id}/delete', [DashboardCategoryController::class,'delete'])->name('dashboard.categories.delete');
            Route::post('/store', [DashboardCategoryController::class,'store'])->name('dashboard.categories.store');
            Route::post('/update', [DashboardCategoryController::class,'update'])->name('dashboard.categories.update');

        });

        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', [DashboardAttributeController::class, 'index'])->name('dashboard.attributes.index');
            Route::get('/create', [DashboardAttributeController::class, 'create'])->name('dashboard.attributes.create');
            Route::get('/{id}/edit', [DashboardAttributeController::class, 'edit'])->name('dashboard.attributes.edit');
            Route::get('/{id}/delete', [DashboardAttributeController::class, 'delete'])->name('dashboard.attributes.delete');
            Route::post('/store', [DashboardAttributeController::class, 'store'])->name('dashboard.attributes.store');
            Route::post('/update', [DashboardAttributeController::class, 'update'])->name('dashboard.attributes.update');

            Route::group(['prefix' => 'values'], function() {

                Route::post('/get', [DashboardAttributeValueController::class, 'getValues']);
                Route::post('/store', [DashboardAttributeValueController::class, 'addValues']);
                Route::post('/update', [DashboardAttributeValueController::class, 'updateValues']);
                Route::post('/delete', [DashboardAttributeValueController::class, 'deleteValues']);

            });

        });

        Route::group(['prefix'  =>   'brands'], function() {

            Route::get('/', [BrandController::class, 'index'])->name('dashboard.brands.index');
            Route::get('/create', [BrandController::class, 'create'])->name('dashboard.brands.create');
            Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('dashboard.brands.edit');
            Route::get('/{id}/delete', [BrandController::class, 'delete'])->name('dashboard.brands.delete');
            Route::post('/store', [BrandController::class, 'store'])->name('dashboard.brands.store');
            Route::post('/update', [BrandController::class, 'update'])->name('dashboard.brands.update');

        });

        Route::group(['prefix' => 'products'], function () {

            Route::get('/', [DashboardProductController::class, 'index'])->name('dashboard.products.index');
            Route::get('/create', [DashboardProductController::class, 'create'])->name('dashboard.products.create');
            Route::get('/edit/{id}', [DashboardProductController::class, 'edit'])->name('dashboard.products.edit');
            Route::post('/store', [DashboardProductController::class, 'store'])->name('dashboard.products.store');
            Route::post('/update', [DashboardProductController::class, 'update'])->name('dashboard.products.update');

            Route::get('images/{id}/delete', [ProductImageController::class, 'delete'])->name('dashboard.products.images.delete');
            Route::post('images/upload', [ProductImageController::class, 'upload'])->name('dashboard.products.images.upload');

            Route::group(['prefix' => 'attributes'], function () {

                Route::get('/load', [ProductAttributeController::class, 'loadAttributes']);
                Route::post('', [ProductAttributeController::class, 'productAttributes']);
                Route::post('/values', [ProductAttributeController::class, 'loadValues']);
                Route::post('/add', [ProductAttributeController::class, 'addAttribute']);
                Route::post('/delete', [ProductAttributeController::class, 'deleteAttribute']);

            });
        });
    });

require __DIR__.'/auth.php';
