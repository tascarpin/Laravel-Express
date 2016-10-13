<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        factory(Post::class, 10)->create()->each(function($u) {
            for($i=0; $i<=5; $i++) {
                $u->comments()->save(factory(Comment::class)->make());
            }
        });
    }
}
