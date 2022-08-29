<?php
namespace App\Transformers;

use App\Models\Category;
use App\Models\Products;
use League\Fractal\TransformerAbstract;
use App\Transformers\ProductTransformer;

class CatalogTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        $products = Products::whereIn('id', $category->products->pluck('id'))->get();

        $products = fractal()->create($products, new ProductTransformer())->toArray();

        $category = fractal()->create($category, new CategoryTransformer())->toArray();

        return [
            'category' => (array) $category['data'],
            'products' => (array) $products['data'],
        ];
    }
}
