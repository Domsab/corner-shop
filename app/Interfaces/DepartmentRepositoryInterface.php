<?php

namespace App\Interfaces;

/**
 * Interface DepartmentContract
 * @package App\Contracts
 */
interface DepartmentRepositoryInterface
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listDepartments(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findDepartmentById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createDepartment(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDepartment(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteDepartment($id);

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function navigation($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc');
}
