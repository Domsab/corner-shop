<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\DepartmentRepositoryInterface;

class NavigationController extends BaseController
{
    /**
     * @var CategoryRepositoryInterface
     */
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
}
