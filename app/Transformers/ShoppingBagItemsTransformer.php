<?php
namespace App\Transformers;

use App\Models\Products;
use Darryldecode\Cart\ItemCollection;
use League\Fractal\TransformerAbstract;

class ShoppingBagItemsTransformer extends TransformerAbstract
{
    public function transform(ItemCollection $item)
    {

        return [
            'bagId'          => $item->id,
            'id'        => (int) $item->associatedModel->id,
            'name'        => (string) $item->associatedModel->name,
            'description' => (string) $item->associatedModel->description,
            'slug'        => (string) $item->associatedModel->slug,
            'price'       => (string) $item->associatedModel->price,
        ];
    }
}
