<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('user_catalogues')->insert(
            [
                [
                    'name'=>'Admin',
                ],
                [
                    'name'=>'User'
                ],

            ]
           
        );

           DB::table('users')->insert([
            'name'=>'NewBiew Laravel',
            'email'=> "admin@gmail.com",
            'password' => Hash::make('12345'),
            'user_catalogue_id' => 1

           ]);
        $this->call([
            UserSeeder::class
        ]);
    }
}
