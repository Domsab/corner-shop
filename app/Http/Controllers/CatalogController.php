<?php

namespace App\Http\Controllers;

use League\Fractal\Manager;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use App\Http\Controllers\BaseController;
use App\Transformers\CatalogTransformer;

use App\Interfaces\CategoryRepositoryInterface;

class CatalogController extends BaseController
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
        $categories = $this->categoryRepository->findCategoryProductsBySlug($categorySlug);

        $catalog = fractal()->create($categories, new CatalogTransformer)->toArray();

        return $this->responseJson($catalog['data']);
    }
}
