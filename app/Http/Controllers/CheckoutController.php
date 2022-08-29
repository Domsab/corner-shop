<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\OrderRepositoryInterface;

class CheckoutController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function show()
    {
        return view('site.pages.checkout');
    }

    public function create(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $order = $this->orderRepository->storeOrderDetails($request->all());

        if($order){
            $this->paymentRepository
                ->setPaymentService()
                ->processPayment($order);
        }

        dd($order);
    }
}
