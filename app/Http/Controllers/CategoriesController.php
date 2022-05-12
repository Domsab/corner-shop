<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\CategoryRepositoryInterface;

class CategoriesController extends BaseController
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show(string $categorySlug)
    {
        $categories = $this->categoryRepository->findCategoryBySlug($categorySlug);

        return $this->responseJson($categories);
    }
}
