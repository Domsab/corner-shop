<?php

namespace App\Interfaces;

/**
 * Interface OrderContract
 * @package App\Contracts
 */
interface OrderRepositoryInterface
{
    /**
     * @param array $params
     * @return mixed
     */
    public function storeOrderDetails($params);
}
