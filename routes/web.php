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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', function () {
    return view('categories', ['categories' => Category::with('posts')->get()]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', ['category' => $category]);
});

Route::get('/users/{user:name}', function (User $user) {
    return view('user', ['user' => $user]);
});

Route::get('/posts', function () {
    return view('posts', ['posts' => Post::with('category')->get()->sortByDesc('updated_at')]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});
