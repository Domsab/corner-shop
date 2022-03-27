<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'name'          =>  $faker->name(),
            'description'   =>  $faker->text(100),
            'parent_id'     =>  1,
            'menu'          =>  1,
        ];
    }


}
