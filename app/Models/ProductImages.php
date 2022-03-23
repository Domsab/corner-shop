<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'product_images';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'thumbnail', 'full'];

    /**
     * @var array
     */
    protected $casts = [
        'product_id'    =>  'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
