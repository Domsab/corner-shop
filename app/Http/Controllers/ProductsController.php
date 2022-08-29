<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\ProductRepositoryInterface;
use App\Transformers\ProductTransformer;

class ProductsController extends BaseController
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show(string $productSlug)
    {
        $product = $this->productRepository->findProductBySlug($productSlug);

        $product = fractal()->create($product, new ProductTransformer)->toArray();

        return $this->responseJson($product['data']);
    }
}
