<?php

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
        DB::table('users')->insert([
            'name' => 'James Leslie',
            'username' => 'jleslie',
            'email' => 'jamesleslie3@gmail.com',
            'password' => '$2y$10$Io1ugRt/qhF..DzFrVLPxutvgXdzDm11a5JXjITGj7KzJ3hL0GUbi',
        ]); 

        DB::table('users')->insert([
            'name' => 'In Time Tec',
            'username' => 'itt',
            'email' => 'info@intimetec.com',
            'password' => '$2y$10$.rRf/6DsYf4nB9g9guuseOhknNeWAUqpHcgCqRMEd2L8.gIJrj3.O',
        ]); 
    }
}
