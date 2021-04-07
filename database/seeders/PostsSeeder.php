<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::truncate();
        Category::truncate();

        $category = new Category;
        $category->name = 'Categoria 1';
        $category->save();

        $category = new Category;
        $category->name = 'Categoria 2';
        $category->save();

        $category = new Category;
        $category->name = 'Categoria 3';
        $category->save();

        $post = new Post;
        $post->title = 'Mi primer post';
        $post->excerpt = 'Extracto de mi primer post';
        $post->body = 'body de mi primer post';
        $post->published_at = Carbon::now();
        $post->category_id = '1';
        $post->save();

        $post = new Post;
        $post->title = 'Mi segundo post';
        $post->excerpt = 'Extracto de mi segundo post';
        $post->body = 'body de mi segundo post';
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = '2';
        $post->save();


        $post = new Post;
        $post->title = 'Mi tercer post';
        $post->excerpt = 'Extracto de mi tercer post';
        $post->body = 'body de mi tercer post';
        $post->published_at = Carbon::now()->subDays(5);
        $post->category_id = '1';
        $post->save();

        $post = new Post;
        $post->title = 'Mi tercer post';
        $post->excerpt = 'Extracto de mi tercer post';
        $post->body = 'body de mi tercer post';
        $post->published_at = Carbon::now()->subDays(10);
        $post->category_id = '2';
        $post->save();

        $post = new Post;
        $post->title = 'Mi cuarto post';
        $post->excerpt = 'Extracto de mi cuarto post';
        $post->body = 'body de mi cuarto post';
        $post->published_at = Carbon::now()->subDays(12);
        $post->category_id = '2';
        $post->save();
    }
}
