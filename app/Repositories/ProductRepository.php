<?php

namespace App\Repositories;

use App\Models\Products;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Products $model
     */
    public function __construct(Products $model)
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
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductById(int $id): array
    {
        return $this->findOneOrFail($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug(string $slug)
    {
        return Products::where('slug', $slug)->first();
    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct(array $params)
    {
        $collection = collect($params);

        $featured = $collection->has('featured') ? 1 : 0;

        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product = new Products($merge->all());

        $product->save();

        if ($collection->has('sub_category_id')) {
            $product->categories()->sync($params['sub_category_id']);
        }

        return $product;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['id']);

        $collection = collect($params);

        $featured = $collection->has('featured') ? 1 : 0;

        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product->update($merge->all());

        if ($collection->has('sub_category_id')) {
            $product->categories()->sync($params['sub_category_id']);
        }

        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);

        $product->delete();

        return $product;
    }
}
