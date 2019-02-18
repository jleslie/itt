<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'title' => 'First Content',
            'key' => 'first-content',
            'type' => 'post',
            'filter' => 'plain',
            'data' => 'This is the first post in the blog!  It is now functional!  It may need some bells and whistles but it is overall working.',
            'user_id' => 1,
            'created_at' => now()
        ]);

        DB::table('contents')->insert([
            'title' => 'Hello World',
            'key' => 'hello-world',
            'type' => 'post',
            'filter' => 'plain',
            'data' => 'Hello World!  How are you today?',
            'user_id' => 2,
            'created_at' => now()
        ]);

        DB::table('contents')->insert([
            'title' => 'The meaning of life',
            'key' => 'meaning-life',
            'type' => 'post',
            'filter' => 'plain',
            'data' => 'What is the answer to life, the universe, and everything?  42 of course!',
            'user_id' => 1,
            'created_at' => now()
        ]);
    }
}
