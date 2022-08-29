<?php

namespace App\Http\Controllers\Dashboard;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Http\Controllers\BaseController;
use App\Transformers\ProductTransformer;
use App\Http\Requests\StoreProductFormRequest;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;

class ProductController extends BaseController
{
    protected $productRepository;

    protected $categoryRepository;


    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
    )
    {
        $this->categoryRepository = $categoryRepository;

        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $fractal = new Manager();

        $resource = new Collection($products, new ProductTransformer);

        $products = $fractal->createData($resource)->toArray();

        return $this->responseJson($products['data']);
    }

    public function show($id)
    {}

    public function create()
    {
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return $this->responseJson(compact('product', 'categories'));
    }

    public function edit($id)
    {
        $product = $this->transform($this->productRepository->findProductById($id));

        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'sku'               => 'required',
            'description'       => 'required',
            'department_id'     => 'required',
            'category_id'       => 'required',
            'sub_category_id'   => 'required',
        ]);

        $params = $request->except('_token');

        $product = $this->transform($this->productRepository->createProduct($params));

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully' ,'success',false, false);
    }

    public function update(StoreProductFormRequest $request)
    {
        \Log::info($request->all());

        $this->validate($request, [
            'name'              => 'required',
            'sku'               => 'required',
            'description'       => 'required',
            'department_id'     => 'required',
            'category_id'       => 'required',
            'sub_category_id'   => 'required',
        ]);

        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    public function delete(int $id)
    {
    }

    private function transform(){

    }
}
