<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Author;
use App\Tag;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // ---------------------INDEX---
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // ---------------------CREATE---
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();

        return view('articles.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // ---------------------STORE---
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => ['required', 'image'],
        ]);

        $data = $request->all();

        $article = new Article;
        $article->title = $data['title'];
        $article->content = $data['content'];
        // $article->img = $data['img'];

        $imgPath = Storage::put('images', $data['img']);
        $article->img = $imgPath;

        $article->author_id = $data['author_id'];

        $article->save();

        
        if(array_key_exists('tags', $data)) {
     
            $article->tag()->sync($data['tags']);
        
        }

        // return redirect()->route('home');
        return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // ---------------------SHOW---
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // ---------------------EDIT---
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // ---------------------UPDATE---
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // ---------------------DESTROY---
    public function destroy($id)
    {
        //
    }
}
