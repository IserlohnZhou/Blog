<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticleController extends Controller
{
    public function show($id)  
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
    
    public function search()
    {
        return view('search')->withArticles(Article::where('title','like','%'.$_POST['str'].'%')->orwhere('body','like','%'.$_POST['str'].'%')->orderBy('updated_at', 'desc')->paginate(5));
        //return view('search')->withArticles(Article::where('body','like','%PHP%')->paginate(5));
    }
}
