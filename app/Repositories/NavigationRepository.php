<?php

namespace App\Repositories;

use App\Models\Navigation;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use App\Interfaces\CollectionRepositoryInterface;
use App\Interfaces\NavigationRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class NavigationRepository extends BaseRepository implements NavigationRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     * @param Collections $model
     */
    public function __construct(Navigation $model)
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
     * @return mixed
     */
    public function updateNavigation(array $params)
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

}
