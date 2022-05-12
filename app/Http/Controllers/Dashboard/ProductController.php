<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CollectionRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

class ProductController extends BaseController
{
    protected $productRepository;

    protected $departmentRepository;

    protected $categoryRepository;

    protected $collectionRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        DepartmentRepositoryInterface $departmentRepository,
        ProductRepositoryInterface $productRepository,
    )
    {
        $this->departmentRepository = $departmentRepository;

        $this->categoryRepository = $categoryRepository;

        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $departments = $this->departmentRepository->listDepartments();

        return $this->responseJson(compact('products', 'departments'));
    }
    public function show($id)
    {}

    public function create()
    {
        $collections = $this->collectionRepository->listCollections('name', 'asc');

        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return $this->responseJson(compact('product', 'categories', 'collections'));
    }

    public function edit($id)
    {
        $product = $this->transform($this->productRepository->findProductById($id));
        // $collections = $this->collectionRepository->listCollections('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return view('admin.products.edit', compact('categories', 'collections', 'product'));
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
