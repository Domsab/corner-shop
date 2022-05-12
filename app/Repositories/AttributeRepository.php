<?php

namespace App\Repositories;

use App\Models\Attributes;
use App\Interfaces\AttributeRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{
    /**
     * AttributeRepository constructor.
     * @param Attributes $model
     */
    public function __construct(Attributes $model)
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
    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAttributeById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createAttribute(array $params)
    {
        try {
            $collection = collect($params);

            $is_filterable = $collection->has('is_filterable') ? 1 : 0;
            $is_required = $collection->has('is_required') ? 1 : 0;

            $merge = $collection->merge(compact('is_filterable', 'is_required'));

            $attributes = new Attributes($merge->all());

            $attributes->save();

            return $attributes;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAttribute(array $params)
    {
        $attributes = $this->findAttributeById($params['id']);

        $collection = collect($params)->except('_token');

        $is_filterable = $collection->has('is_filterable') ? 1 : 0;
        $is_required = $collection->has('is_required') ? 1 : 0;

        $merge = $collection->merge(compact('is_filterable', 'is_required'));

        $attributes->update($merge->all());

        return $attributes;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAttribute($id)
    {
        $attributes = $this->findAttributeById($id);

        $attributes->delete();

        return $attributes;
    }

}
