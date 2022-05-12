<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

class CategoryController extends BaseController
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var DepartmentRepositoryInterface
     */
    protected $departmentRepository;

    /**
     * CategoryController constructor.
     * @param DepartmentRepositoryInterface $departmentRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        DepartmentRepositoryInterface $departmentRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->departmentRepository = $departmentRepository;

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

    public function show($id)
    {}

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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required',
            'department_id' => 'required_without:parent_id',
            'parent_id'     => 'required_without:department_id',
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->createCategory($params);

        if (!$category) {
            return $this->responseJson($request->all(), 404,'Error occurred while creating category.', true);
        }

        $departments = $this->departmentRepository->listDepartments();

        return $this->responseJson($departments, 200, 'Category added successfully.', false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required',
            // 'department_id' => 'required_without:parent_id',
            // 'parent_id'     => 'required_without:department_id',
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategory($params);

        if (!$category) {
            return $this->responseJson($request->all(), 404,'Error occurred while updating category.', true);
        }

        $departments = $this->departmentRepository->listDepartments();

        return $this->responseJson($departments, 200, 'Category updated successfully.', false);
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

        $departments = $this->departmentRepository->listDepartments();

        return $this->responseJson($departments, 200, 'Category deleted successfully.', false);
    }
}
