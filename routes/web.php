<?php

use App\Http\Controllers\PostController;
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

Route::get('/categories/{category:slug}', fn(Category $category) => view('posts', [
    'category' => $category,
    'posts' => $category->posts,
    'categories' => Category::all(),
]));

Route::get('/authors/{author:username}', fn(User $author) => view('user', ['user' => $author]));

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
