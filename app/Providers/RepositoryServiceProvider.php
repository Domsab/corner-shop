<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\CollectionRepository;
use App\Repositories\DepartmentRepository;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\AttributeRepositoryInterface;
use App\Interfaces\CollectionRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        OrderRepositoryInterface::class       => OrderRepository::class,
        ProductRepositoryInterface::class     => ProductRepository::class,
        CategoryRepositoryInterface::class    => CategoryRepository::class,
        AttributeRepositoryInterface::class   => AttributeRepository::class,
        CollectionRepositoryInterface::class  => CollectionRepository::class,
        DepartmentRepositoryInterface::class  => DepartmentRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
