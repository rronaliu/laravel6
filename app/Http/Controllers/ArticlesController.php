<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() // when we list an article we use a view called index in an action called indx
    {

        // Render a list of a resource 

        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id) { // when we show an article we use show()

        // Show a single resource
        $article= Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create() {
        // Shows a view to create a new resource
        return view('articles.create');
    }

    public function store() {
        // validation

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        

        // Persists the new resource
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit($id) {
        // Show a view to edit an existing resource (resoource = item)
        $article = Article::find($id);


        return view('articles.edit', compact('article')); // or ['article'=>$article] ne vend te compact() function
    }

    public function update($id) {

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);


        // Persist the edited resource

        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);


    }

    public function destroy() {
        // Delete the resource
    }
}
