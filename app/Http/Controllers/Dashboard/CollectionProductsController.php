<?php

namespace App\Http\Controllers\Dashboard;

use League\Fractal\Manager;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;
use App\Http\Controllers\BaseController;
use App\Transformers\ProductTransformer;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CollectionRepositoryInterface;

class CollectionProductsController extends BaseController
{
    protected $collectionRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct( CollectionRepositoryInterface $collectionRepository )
    {
        $this->collectionRepository = $collectionRepository;
    }

    public function show(int $collectionId)
    {
        $products = $this->collectionRepository->findCollectionProducts($collectionId);

        $fractal = new Manager();

        $resource = new Collection($products, new ProductTransformer);

        $products = $fractal->createData($resource)->toArray();

        return $this->responseJson($products['data']);
    }
}
