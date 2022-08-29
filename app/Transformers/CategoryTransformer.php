<?php
namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        $data = [
            'id'   => (int) $category->id,
            'name' => (string) $category->name,
            'slug' => (string) $category->slug,
        ];

        if($category->parent_id){
            $parent = Category::find($category->parent_id);

            $data['parent_id'] = $parent->id;
            $data['parent_name'] = $parent->name;
        }

        if($parent->department_id){
            $department = Category::find($parent->department_id);

            $data['department_id'] = $department->id;
            $data['department_name'] = $department->name;
        }

        return $data;
    }
}
