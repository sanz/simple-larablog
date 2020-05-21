<?php

use App\Post;
use App\Category;
use App\Comment;
use App\User;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        User::truncate();
        Post::truncate();
        Comment::truncate();

        factory(Category::class, 10)->create();
        factory(User::class, 10)->create();
        factory(Post::class, 25)->create();
        factory(Comment::class, 40)->create();

        $user = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@laravelproject.com',
            'password'  => bcrypt('admin')
        ]);

        $user->is_admin = true;
        $user->save();
    }
}
