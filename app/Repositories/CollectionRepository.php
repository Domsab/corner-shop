<?php

namespace App\Repositories;

use App\Models\Products;
use App\Traits\UploadAble;
use App\Models\Collections;
use Illuminate\Http\UploadedFile;
use App\Repositories\BaseRepository;
use App\Interfaces\CollectionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class CollectionRepository extends BaseRepository implements CollectionRepositoryInterface
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Collections $model
     */
    public function __construct(Collections $model)
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
    public function listCollections(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model
            ->where('active', true)
            ->with('categories', function($query) {
                $query->with('subCategories');
            })
            ->get($columns);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCollectionById(int $id)
    {
        return $this->model
            ->where('id', $id)
            ->with('categories', function($query) {
                $query->with('subCategories');
            })
            ->first();
    }

    /**
     * @param integer $id
     * @return Products
     */
    public function findCollectionProducts(int $id) : Products
    {
        $productIds = [];

        $collection = $this->findCollectionById($id);

        foreach ($collection->categories as $category) {
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
     * @return Collections|mixed
     */
    public function createCollection(array $params)
    {
        $collection = collect($params);

        $active = 1;

        $slug = $params['name'];

        $merge = $collection->merge(compact('active', 'slug'));

        return $this->model::create($merge->all());

    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCollection(array $params)
    {
        $collection = $this->findCollectionById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {

            if ($collection->logo != null) {
                $this->deleteOne($collection->logo);
            }

            $logo = $this->uploadOne($params['logo'], 'collections');
        }

        $merge = $collection->merge(compact('logo'));

        $collection->update($merge->all());

        return $collection;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCollection($id)
    {
        $collection = $this->findCollectionById($id);

        if ($collection->logo != null) {
            $this->deleteOne($collection->logo);
        }

        return $collection->delete();
    }

}
