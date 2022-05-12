<?php

namespace App\Repositories;

use App\Traits\UploadAble;
use App\Models\Collections;
use Illuminate\Http\UploadedFile;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
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
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCollectionById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Collections|mixed
     */
    public function createCollection(array $params)
    {
        try {
            $collection = collect($params);

            $logo = null;

            if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {
                $logo = $this->uploadOne($params['logo'], 'collections');
            }

            $merge = $collection->merge(compact('logo'));

            $collection = new Collections($merge->all());

            $collection->save();

            return $collection;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
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

        $collection->delete();

        return $collection;
    }

}
