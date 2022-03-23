<?php

namespace Database\Seeders;

use App\Models\AttributeValues;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['small', 'medium', 'large'];
        $colors = ['black', 'blue', 'red', 'orange'];

        foreach ($sizes as $size)
        {
            AttributeValues::create([
                'attribute_id'      =>  1,
                'value'             =>  $size,
                'price'             =>  null,
            ]);
        }

        foreach ($colors as $color)
        {
            AttributeValues::create([
                'attribute_id'      =>  2,
                'value'             =>  $color,
                'price'             =>  null,
            ]);
        }
    }
}
