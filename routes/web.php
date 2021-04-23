<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\PostsController;

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

Route::get('/', [PagesController::class, 'index']);

Auth::routes();


// Route::middleware(['auth'])->group(function () {

// });

// Route::group(['prefix'=>'admin', 'middleware' => 'auth' ], function(){
//     Route::get('posts', [PostsController::class, 'index']);
// })->name();

// Route::get('/admin', function(){
//     return view('admin.dashboard');
// })->middleware('auth')->name('admin.index');



Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('posts', [PostsController::class, 'index'])->name('admin.posts.index');

    Route::get('/posts/create', [PostsController::class, 'create'])->name('admin.posts.create');

    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

});



// Route::get('/posts', function() {
//     return Post::all();
// });

// Route::get('/admin', function(){
//     return view('admin.welcome');
// });

// Route::get('/login', function() {
//     return view('auth.login');
// })->name('login');

