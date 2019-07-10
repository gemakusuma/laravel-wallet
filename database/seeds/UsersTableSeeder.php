<?php

use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'id' => Uuid::uuid(),
            'username' => 'gema',
            'email' => 'dityaksm21@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'id' => Uuid::uuid(),
            'username' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
