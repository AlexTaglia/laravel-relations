<?php

use Illuminate\Support\Facades\Route;
use App\Article;

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
    return redirect()->route('home');
});

Route::get('/home', function () {
    $articles = Article::orderBy('created_at', 'DESC')->paginate(3);
    return view('home', compact('articles'));
})->name('home');

Route::resource('article', 'ArticleController');

Route::resource('comment', 'CommentController');