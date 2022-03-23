<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryController extends BaseController
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->listCategories();

        return $this->responseJson($categories);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            // 'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->createCategory($params);

        if (!$category) {
            return $this->responseJson($request->all(), 404,'Error occurred while creating category.', true);
        }

        return $this->responseJson($category, 200, 'Category added successfully.', false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetCategory = $this->categoryRepository->findCategoryById($id);

        return $this->responseJson($targetCategory);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
        'name'      =>  'required|max:191',
        'parent_id' =>  'required|not_in:0',
        'image'     =>  'mimes:jpg,jpeg,png|max:1000'
    ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategory($params);

        if (!$category) {
            return $this->responseJson($request->all(), 404,'Error occurred while updating category.', true);
            // return $this->responseJson('Error occurred while updating category.', 'error', true, true);
        }
        return $this->responseJson($category, 200, 'Category updated successfully.', false);
        // return $this->responseJson('Category updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseJson(['id' => $id], 404,'Error occurred while deleting category.', true);
            // return $this->responseJson('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseJson([], 200, 'Category deleted successfully', false);
        // return $this->responseJson('admin.categories.index', 'Category deleted successfully', 'success', false, false);
    }
}
