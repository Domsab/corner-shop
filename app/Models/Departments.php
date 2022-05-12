<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departments extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'description', 'department_id', 'parent_id', 'featured', 'active', 'image'
    ];

    protected $casts = [
        'parent_id' =>  'integer',
        'featured'  =>  'boolean',
        'active'    =>  'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'department_id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getParentNameAttribute()
    {
        return $this->where('id', $this->parent_id)
            ->pluck('name');
    }

    public function getLinkAttribute()
    {
        return '#/' . $this->attributes['slug'];
    }

    public function getActiveAttribute()
    {
         return (bool) $this->attributes['active'];
    }
}

