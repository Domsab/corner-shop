<?php
namespace App\Transformers;

use App\Models\Category;
use App\Models\Products;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use App\Transformers\CategoryTransformer;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Products $product)
    {
        $fractal = new Manager();

        $resource = new Item(Category::find($product->category_id), new CategoryTransformer);

        $category = $fractal->createData($resource)->toArray();

        return [
            'id'          => (int) $product->id,
            'name'        => (string) $product->name,
            'description' => (string) $product->description,
            'sku'         => (string) $product->sku,
            'quantity'    => (string) $product->quantity,
            'weight'      => (string) $product->weight,
            'price'       => (string) $product->price,
            'sale_price'  => (string) $product->sale_price,
            'status'      => (bool) $product->status,
            'featured'    => (bool) $product->featured,
            'category'    => (array) $category['data'],
        ];
    }
}
