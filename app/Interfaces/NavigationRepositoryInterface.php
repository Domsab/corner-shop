<?php

namespace App\Interfaces;

/**
 * Interface NavigationContract
 * @package App\Contracts
 */
interface NavigationRepositoryInterface
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listNavigation(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param array $params
     * @return mixed
     */
    public function createNavigation(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateNavigation(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteNavigation($id);
}
