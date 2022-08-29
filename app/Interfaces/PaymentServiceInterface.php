<?php

namespace App\Interfaces;

use App\Models\Orders;

interface PaymentServiceInterface
{
    public function processPayment(Orders $order);


}
