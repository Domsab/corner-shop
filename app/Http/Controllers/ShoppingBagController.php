<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Transformers\ShoppingBagItemsTransformer;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ShoppingBagController extends BaseController
{
    public function index()
    {
        return $this->getShopping();
    }

    public function store(Request $request)
    {
        $product = Products::find($request->id);

        Cart::add([
            'id' => uniqid(),
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'associatedModel' => $product
        ]);

        return $this->getShopping();

    }

    public function remove(string $action)
    {
        ($action === 'all-items')
            ? Cart::clear()
            : Cart::remove($action);

        return $this->getShopping();
    }

    private function getShopping()
    {
        $shoppingItems = fractal()
            ->create(Cart::getContent(), new ShoppingBagItemsTransformer)
            ->toArray();

        $response = [
            'items'     => $shoppingItems['data'],
            'subTotal'  => Cart::getSubtotal(),
            'total'     => Cart::getTotal(),
        ];

        return $this->responseJson($response);
    }
}
