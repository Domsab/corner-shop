<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\AttributeValueController;

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

Route::middleware('auth')->prefix('/dashboard')
    ->group(function () {

        Route::get('/', function () { return view('dashboard'); })->name('dashboard');

        Route::get('/settings', [SettingsController::class, 'index'])->name('json.dashboard.settings');
        Route::post('/settings', [SettingsController::class,'update'])->name('dashboard.settings.update');

        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', [CategoryController::class,'index'])->name('dashboard.categories.index');
            Route::get('/create', [CategoryController::class,'create'])->name('dashboard.categories.create');
            Route::get('/{id}/edit', [CategoryController::class,'edit'])->name('dashboard.categories.edit');
            Route::get('/{id}/delete', [CategoryController::class,'delete'])->name('dashboard.categories.delete');
            Route::post('/store', [CategoryController::class,'store'])->name('dashboard.categories.store');
            Route::post('/update', [CategoryController::class,'update'])->name('dashboard.categories.update');

        });

        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', [AttributeController::class, 'index'])->name('dashboard.attributes.index');
            Route::get('/create', [AttributeController::class, 'create'])->name('dashboard.attributes.create');
            Route::get('/{id}/edit', [AttributeController::class, 'edit'])->name('dashboard.attributes.edit');
            Route::get('/{id}/delete', [AttributeController::class, 'delete'])->name('dashboard.attributes.delete');
            Route::post('/store', [AttributeController::class, 'store'])->name('dashboard.attributes.store');
            Route::post('/update', [AttributeController::class, 'update'])->name('dashboard.attributes.update');

            Route::group(['prefix' => 'values'], function() {

                Route::post('/get', [AttributeValueController::class, 'getValues']);
                Route::post('/store', [AttributeValueController::class, 'addValues']);
                Route::post('/update', [AttributeValueController::class, 'updateValues']);
                Route::post('/delete', [AttributeValueController::class, 'deleteValues']);

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

            Route::get('/', [ProductController::class, 'index'])->name('dashboard.products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('dashboard.products.create');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('dashboard.products.edit');
            Route::post('/store', [ProductController::class, 'store'])->name('dashboard.products.store');
            Route::post('/update', [ProductController::class, 'update'])->name('dashboard.products.update');

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
