<?php

namespace App\Providers;

use App\Repositories\BrandRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\DepartmentRepository;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\AttributeRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        BrandRepositoryInterface::class       => BrandRepository::class,
        ProductRepositoryInterface::class     => ProductRepository::class,
        CategoryRepositoryInterface::class    => CategoryRepository::class,
        AttributeRepositoryInterface::class   => AttributeRepository::class,
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
