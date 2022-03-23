<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Http\Requests\StoreProductFormRequest;

class ProductController extends BaseController
{
    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;

    public function __construct(
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $brands = $this->brandRepository->listBrands('name', 'asc');

        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return $this->responseJson(compact('products', 'categories', 'brands'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');

        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return $this->responseJson(compact('product', 'categories', 'brands'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->createProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }
}
