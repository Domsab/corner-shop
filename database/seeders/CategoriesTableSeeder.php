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
        $departments = [
            [
                'name'          => 'Men',
                'description'   => 'Mens apparel',
                'parent_id'     => null,
                'active'        => 1,
                'slug'          => 'mens',
                'categories'    => [
                    'Shoes'     => [
                        'subCategories' => [
                            'Jordans', 'lifestyle', 'Running', 'Basketball', 'Football', 'Training & Gym',
                        ],
                    ],
                    'Joggers'   => [
                        'subCategories' => [
                            'lifestyle', 'Running', 'Basketball', 'Football', 'Training & Gym'
                        ],
                    ],
                    'Sweaters'  => [
                        'subCategories' => [
                            'lifestyle', 'Running', 'Basketball', 'Training & Gym'
                        ],
                    ],
                    'Shorts'    => [
                        'subCategories' => [
                            'lifestyle', 'Running', 'Basketball', 'Football', 'Training & Gym'
                        ],
                    ],
                    'T-shirts'  => [
                        'subCategories' => [
                            'Running', 'Basketball', 'Football', 'Training & Gym'
                        ],
                    ],
                ],
            ],
            [
                'name'          => 'Women',
                'description'   => 'Womens apparel',
                'parent_id'     => null,
                'active'        => 1,
                'slug'          => 'womens',
                'categories'    => [
                    'Shoes'     => [
                        'subCategories' => [
                            'Jordans', 'lifestyle', 'Running', 'Basketball', 'Training & Gym',
                        ],
                    ],
                    'Joggers'   => [
                        'subCategories' => [
                            'lifestyle', 'Running', 'Basketball', 'Football', 'Training & Gym'
                        ],
                    ],
                    'Sweaters'  => [
                        'subCategories' => [
                            'lifestyle', 'Running', 'Basketball', 'Football', 'Training & Gym'
                        ],
                    ],
                    'Shorts'    => [
                        'subCategories' => [
                            'lifestyle', 'Running', 'Basketball', 'Football', 'Training & Gym'
                        ],
                    ],
                    'T-shirts'  => [
                        'subCategories' => [
                            'lifestyle', 'Running', 'Football', 'Training & Gym'
                        ],
                    ],
                ],
            ],
            [
                'name'          => 'Kids',
                'description'   => 'Kids apparel',
                'parent_id'     => null,
                'active'        => 1,
                'slug'          => 'kids',
                'categories'    => [
                    'Shoes'     => [
                        'subCategories' => [
                            'Jordan Jnrs', 'lifestyle', 'Basketball', 'Football',
                        ],
                    ],
                    'Tracksuits'   => [
                        'subCategories' => [
                            'Baby', 'Toddler', 'Basketball', 'Football',
                        ],
                    ],
                    'Sweaters'  => [
                        'subCategories' => [
                            'Toddler', 'Basketball', 'Football',
                        ],
                    ],
                    'T-shirts'  => [
                        'subCategories' => [
                            'Baby', 'Toddler', 'Basketball', 'Football',
                        ],
                    ],
                ],
            ],
        ];

        foreach($departments as $department){

            Category::create([
                'name'          => $department['name'],
                'description'   => $department['description'],
                'parent_id'     => null,
                'department_id' => null,
                'active'        => $department['active'],
                'slug'          => $department['slug'],
            ]);
            dump($department['name']);
            $createdDepartment = Category::where('name', $department['name'])->first();

            foreach($department['categories'] as $category => $subCategories){

                dump($department['name'] . '->' . $category);

                Category::factory()->create([
                    'department_id' => $createdDepartment->id,
                    'name' => $category,
                    'parent_id'     => null,
                    'slug' =>  $createdDepartment->slug . '-' . $category
                ]);

                $createdCategory = Category::where('slug', $createdDepartment->slug . '-' . $category)->first();

                foreach($subCategories['subCategories'] as $key => $subcategory){

                    dump($department['name'] . '->' . $category . '->' . $subcategory);

                    Category::factory()->create([
                        'department_id' => null,
                        'parent_id' => $createdCategory->id,
                        'name' => $subcategory,
                        'slug' => $createdCategory->slug . '-' . $subcategory,
                    ]);

                }

            }

        }


        Category::create([
            'name'          => 'Sports',
            'description'   => 'Sports specific apparel',
            'parent_id'     => null,
            'department_id'     => null,
            'active'        => 1,
            'slug'          => 'sports'
        ]);

        $createdDepartment = Category::where('name', 'Sports')->first();

        $categories =  ['Basketball', 'Football', 'MMA'];

        foreach($categories as $key => $category){

            Category::factory()->create([
                'department_id' => $createdDepartment->id,
                'name' => $category,
                'parent_id'     => null,
                'slug' =>  $createdDepartment->slug . '-' . $category
            ]);

            $createdCategory = Category::where('slug', $createdDepartment->slug . '-' . $category)->first();

            $subCategories = ['Shoes', 'Tops', 'Shorts'];

            foreach($subCategories as $key => $subcategory){

                Category::factory()->create([
                    'department_id' => null,
                    'parent_id' => $createdCategory->id,
                    'name' => $subcategory,
                    'slug' => $createdCategory->slug . '-' . $subcategory,
                ]);

            }

        }


    }
}
