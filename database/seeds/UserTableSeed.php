<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=>'1',
           'name' => 'Admin',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('123456'),
        ]); 
    }
}
