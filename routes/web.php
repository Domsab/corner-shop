<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SettingsController;

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

        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/settings', [SettingsController::class, 'index'])->name('json.dashboard.settings');
        Route::post('/settings', [SettingsController::class,'update'])->name('dashboard.settings.update');

        Route::group(['prefix'  =>   'categories'], function() {
            Route::get('/', [CategoryController::class,'index'])->name('dashboard.categories.index');
            Route::get('/create', [CategoryController::class,'create'])->name('dashboard.categories.create');
            Route::post('/store', [CategoryController::class,'store'])->name('dashboard.categories.store');
            Route::get('/{id}/edit', [CategoryController::class,'edit'])->name('dashboard.categories.edit');
            Route::post('/update', [CategoryController::class,'update'])->name('dashboard.categories.update');
            Route::get('/{id}/delete', [CategoryController::class,'delete'])->name('dashboard.categories.delete');
        });
    });

require __DIR__.'/auth.php';
