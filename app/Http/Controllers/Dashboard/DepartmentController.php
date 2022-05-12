<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

class DepartmentController extends BaseController
{
    protected $departmentRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = $this->departmentRepository->listDepartments();

        return $this->responseJson($departments);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $department = $this->departmentRepository->findDepartmentById($id);

        return $this->responseJson($department);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        =>  'required',
            'description' =>  'required',
        ]);

        $params = $request->except('_token');

        $department = $this->departmentRepository->createDepartment($params);

        if (!$department) {
            return $this->responseJson($request->all(), 404,'Error occurred while creating department.', true);
        }

        $departments = $this->departmentRepository->listDepartments();

        return $this->responseJson($departments, 200, 'Department added successfully.', false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id'          => 'required',
            'name'        => 'required',
            'description' => 'required',
        ]);

        $params = $request->except('_token');

        $department = $this->departmentRepository->updateDepartment($params);

        if (!$department) {
            return $this->responseJson($request->all(), 404,'Error occurred while updating department.', true);
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
        $department = $this->departmentRepository->deleteDepartment($id);

        if (!$department) {
            return $this->responseJson(['id' => $id], 404,'Error occurred while deleting department.', true);
        }

        $departments = $this->departmentRepository->listDepartments();

        return $this->responseJson($departments, 200, 'department deleted successfully', false);
    }
}
