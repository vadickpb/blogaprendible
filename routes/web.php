<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $posts = Post::all();
    return view('welcome', compact('posts'));
});


Auth::routes(["register" => false]);
Auth::routes();

Route::get('/posts', function() {
    return Post::all();
});

Route::get('/admin', function(){
    return view('admin.welcome');
});
