<?php

namespace App\Repositories;

use App\Models\Products;
use App\Traits\UploadAble;
use App\Models\Departments;
use App\Repositories\BaseRepository;
use App\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;


/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    use UploadAble;

    /**
     * DepartmentRepository constructor.
     * @param Departments $model
     */
    public function __construct(Departments $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function listDepartments(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model
            ->where('department_id', null)
            ->where('parent_id', null)
            ->where('active', true)
            ->orderBy($order, $sort)
            ->with('categories', function($query) {
                $query
                    ->where('active', true)
                    ->with('subCategories');
            })
            ->get($columns);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findDepartmentById(int $id) : Departments
    {
        return $this->model
            ->where('id', $id)
            ->with('categories', function($query) {
                $query->with('subCategories');
            })
            ->first();

    }

    public function findDepartmentProductsById(int $id) : EloquentCollection
    {
        $productIds = [];

        $department = $this->findDepartmentById($id);

        foreach ($department->categories as $category) {
            if($category->products->count()){
                $productIds = array_merge($productIds, $category->products->pluck('id')->toArray());
            }

            foreach ($category->subCategories as $subCategory) {
                if($subCategory->products->count()){
                    $productIds = array_merge($productIds, $subCategory->products->pluck('id')->toArray());
                }
            }

        }

       return Products::whereIn('id',$productIds)->get();
    }

    /**
     * @param array $params
     * @return Departments|mixed
     */
    public function createDepartment(array $params)
    {
        $collection = collect($params);

        $active = 1;

        $slug = $params['name'];

        $parentId = $departmentId = null;

        $merge = $collection->merge(compact('active', 'slug', 'departmentId', 'parentId'));

        return Departments::create($merge->all());
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDepartment(array $params)
    {
        $department = $this->findDepartmentById($params['id']);

        return $department->update($params);
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteDepartment($id)
    {
        $department = $this->findDepartmentById($id);

        return $department->delete();
    }

    /**
     * @return mixed
     */
    public function navigation($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model
            ->where('parent_id', null)
            ->where('active', true)
            ->orderBy($orderBy, $sortBy)
            ->with('subCategories', function($query) {
                $query->where('active', true);
            })
            ->get($columns);
    }

}
