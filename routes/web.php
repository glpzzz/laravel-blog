<?php

use App\Models\{Category, Post, User};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => view('welcome'));

Route::get('/categories', fn() => view('categories', ['categories' => Category::with('posts')->get()]));

Route::get('/categories/{category:slug}', fn(Category $category) => view('category', ['category' => $category]));

Route::get('/authors/{author:username}', fn(User $author) => view('user', ['user' => $author]));

Route::get('/posts', fn() => view('posts', ['posts' => Post::with(['category', 'author'])->get()->sortByDesc('updated_at')]));

Route::get('/posts/{post:slug}', fn(Post $post) => view('post', ['post' => $post]));
