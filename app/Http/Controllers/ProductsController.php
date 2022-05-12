<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\ProductRepositoryInterface;

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
        $this->productRepository->getProductBySlug($productSlug);

        return $this->responseJson('vda');
    }
}
