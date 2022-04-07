<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     =>  'Dominic Sabatini',
            'email'    =>  'domsab@hotmail.com',
            'password' =>  Hash::make('password'),
        ]);
    }
}
