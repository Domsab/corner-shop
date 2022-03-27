<?php

namespace Database\Seeders;

use App\Models\Attributes;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attributes::create([
            'name'     =>  'Dominic Sabatini',
            'email'    =>  'domsab@hotmail.com',
            'password' =>  'password',
        ]);
    }
}
