<?php

namespace App\Transformers;

use App\Models\ProductImages;
use League\Fractal\TransformerAbstract;

class ProductImageTransformer extends TransformerAbstract
{
    public function transform(ProductImages $productImages)
    {
        return [
            'id'              => (int) $productImages->id,
            'product_id'      => (int) $productImages->product_id,
            'thumbnail_path'  => (string) $productImages->thumbnail_path,
            'full_path'       => (string) $productImages->full_path,
        ];
    }
}
