<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>  'Men',
            'description'   =>  'Mens apparel',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        Category::factory()->count(5)->create([
            'id' => Category::pluck()
        ]);

        Category::create([
            'name'          =>  'Women',
            'description'   =>  'Womens apparel',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        Category::factory()->count(5)->create([
            'id' => 2
        ]);

        Category::create([
            'name'          =>  'Kids',
            'description'   =>  'Kids apparel',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        Category::factory()->count(5)->create([
            'id' => 3
        ]);

        Category::create([
            'name'          =>  'Sports',
            'description'   =>  'Sports specific apparel',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        Category::factory()->count(5)->create([
            'id' => 4
        ]);
    }
}
