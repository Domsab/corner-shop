<?php
namespace App\Transformers;

use App\Models\Category;
use App\Models\Products;
use League\Fractal\TransformerAbstract;
use App\Transformers\CategoryTransformer;
use App\Transformers\ProductImageTransformer;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Products $product)
    {
        $categories = Category::whereIn('id', $product->categories->pluck('id'))->get();

        $productCategories = fractal()->create($categories, new CategoryTransformer)->toArray();

        $productImages = fractal()->create($product->images()->get(), new ProductImageTransformer())->toArray();

        return [
            'id'          => (int) $product->id,
            'name'        => (string) $product->name,
            'description' => (string) $product->description,
            'sku'         => (string) $product->sku,
            'quantity'    => (string) $product->quantity,
            'slug'        => (string) $product->slug,
            'weight'      => (string) $product->weight,
            'price'       => (string) $product->price,
            'sale_price'  => (string) $product->sale_price,
            'status'      => (bool) $product->status,
            'featured'    => (bool) $product->featured,
            'categories'  => (array) $productCategories['data'],
            'images'      => (array) $productImages['data'],
        ];
    }

    public function includeCategories(Products $product)
    {

    }

    public function includeImages(Products $images)
    {
        # code...
    }
}
