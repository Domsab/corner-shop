<?php

namespace Database\Seeders;

use App\Models\Collections;
use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collections::create([
            'name'          => 'Lifestyle',
            'slug'          => 'mens'
        ]);

        Collections::create([
            'name'          => 'Training',
            'slug'          => 'womens'
        ]);

        Collections::create([
            'name'          => 'Jordans',
            'slug'          => 'kids'
        ]);

        Collections::create([
            'name'          => 'Football',
            'slug'          => 'sports'
        ]);

    }
}
