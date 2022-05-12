<?php

namespace App\Interfaces;

/**
 * Interface CollectionContract
 * @package App\Contracts
 */
interface CollectionRepositoryInterface
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCollections(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCollectionById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCollection(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCollection(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCollection($id);
}
