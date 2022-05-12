<?php

namespace App\Http\Controllers\Dashboard;

use League\Fractal\Manager;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;
use App\Http\Controllers\BaseController;
use App\Transformers\ProductTransformer;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

class DepartmentProductsController extends BaseController
{
    protected $departmentRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct( DepartmentRepositoryInterface $departmentRepository )
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function show(int $departmentId)
    {
        $products = $this->departmentRepository->findDepartmentProductsById($departmentId);

        $fractal = new Manager();

        $resource = new Collection($products, new ProductTransformer);

        $products = $fractal->createData($resource)->toArray();

        return $this->responseJson($products['data']);
    }
}
