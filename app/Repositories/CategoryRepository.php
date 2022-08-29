<?php

namespace App\Repositories;

use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCategoryById(int $id)
    {
        return Category::with('products')
            ->with('parent', function ($query) {
                $query->with('department');
            })
            ->where('id', $id)
            ->first();
    }

    public function findCategoryProductsBySlug(string $slug)
    {
        return Category::with('products')
            ->with('parent', function ($query) {
                $query->with('department');
            })
            ->where('slug', $slug)
            ->first();
    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createCategory(array $params)
    {
        $collection = collect($params);

        $slug = '';

        if ($params['department_id']) {
            $department = $this->findCategoryById($params['department_id']);
            $slug .= $department['name'] . ' ';
        }

        if ($params['parent_id']) {
            $parent = $this->findCategoryById($params['parent_id']);
            $slug .= $parent['name'] . ' ';
        }

        $slug .= $params['name'];

        $image = null;

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
            $image = $this->uploadOne($params['image'], 'categories');
        }

        $merge = $collection->merge(compact('slug', 'image'));

        return Category::create($merge->all());
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

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
    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

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
            ->with('subCategories', function ($query) {
                $query->where('active', true);
            })


            ->get($columns);
    }
}
