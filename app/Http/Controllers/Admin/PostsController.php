<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags', 'categories'));
    }

    public function store(Request $request){

        //Validacion
        $request->validate([
            'title' => 'required'

        ]);


        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->published_at = $request->get('published_at');
        $post->category_id = $request->category_id;
        // $post->tags->id = $request->tags;
        $post->excerpt = $request->excerpt;


        $post->save();

        $post->tags()->attach($request->get('tags'));


        return back()->with('message', 'Se completo el registro');
    }
}
