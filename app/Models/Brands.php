<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brands extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'brands';

    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'logo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
