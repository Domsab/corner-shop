<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Navigation;
use App\Models\Collections;
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
        $collections = [
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
            [
                'name'          => 'Sports',
                'description'   => 'Sports apparel',
                'parent_id'     => null,
                'active'        => 1,
                'slug'          => 'sports',
                'categories'    => [
                    'Basketball'     => [
                        'subCategories' => [
                            'Shoes', 'Jersey\'', 'Shorts'
                        ],
                    ],
                    'Football'   => [
                        'subCategories' => [
                            'Shoes', 'Shirts', 'Shorts', 'Training'
                        ],
                    ],
                    'MMA'  => [
                        'subCategories' => [
                            'Gloves', 'Muay Thai', 'BJJ', 'Wrestling'
                        ],
                    ],
                ],
            ],
        ];

        foreach($collections as $collection){

            Collections::create([
                'name'          => $collection['name'],
                'description'   => $collection['description'],
                'active'        => $collection['active'],
                'slug'          => $collection['slug'],
            ]);

            dump('Creating collection: ', $collection['name']);

            $createdCollection = Collections::where('name', $collection['name'])->first();

            Navigation::create([
                'label'         => $createdCollection->name,
                'collection_id' => $createdCollection->id,
                'slug'          => $createdCollection->slug,
            ]);

            foreach($collection['categories'] as $category => $subCategories){

                dump($collection['name'] . '->' . $category);

                Category::factory()->create([
                    'name' => $category,
                    'parent_id'     => null,
                    'slug' =>  $createdCollection->slug . '-' . $category
                ]);

                $createdCategory = Category::where('slug', $createdCollection->slug . '-' . $category)->first();

                $createdCategory->collections()->attach( $createdCollection->id );

                foreach($subCategories['subCategories'] as $key => $subcategory){

                    dump($collection['name'] . '->' . $category . '->' . $subcategory);

                    Category::factory()->create([
                        'parent_id' => $createdCategory->id,
                        'name' => $subcategory,
                        'slug' => $createdCategory->slug . '-' . $subcategory,
                    ]);

                }

            }

        }

    }
}
