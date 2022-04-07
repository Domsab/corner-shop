<?php

namespace App\Repositories;

use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;

use App\Interfaces\DepartmentRepositoryInterface;
use App\Models\Departments;
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
    public function findDepartmentById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Departments|mixed
     */
    public function createDepartment(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;

            $active = $collection->has('active') ? 1 : 0;

            $merge = $collection->merge(compact('active', 'image', 'featured'));

            $category = new Departments($merge->all());

            $category->save();

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDepartment(array $params)
    {
        $category = $this->findDepartmentById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
            if ($category->image != null) {
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $active = $collection->has('active') ? 1 : 0;

        $merge = $collection->merge(compact('active', 'image', 'featured'));

        $category->update($merge->all());

        return $category;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteDepartment($id)
    {
        $category = $this->findDepartmentById($id);

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
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
            ->with('children', function($query) {
                $query->where('active', true);
            })
            ->get($columns);
    }

}
