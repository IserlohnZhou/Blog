<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class ArticleController extends Controller
{
    public function index()  
    {
        return view('admin/article/index')->withArticles(Article::paginate(5));
    }
    
    public function create()  //create articles
    {
        return view('admin/article/create');
    }
    
    public function store(Request $request)  
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('Save fails');
        }
    }
    
    public function destroy($id)   //delete articles
    {
        Article::find($id)->delete();
        \App\Comment::where('article_id','=',$id)->delete();
        \App\Tag::where('article_id','=',$id)->delete();
        return redirect()->back()->withInput()->withErrors('Delete completed!');
    }
    
    public function edit($id)   //edit articles
    {
         return view('admin/article/edit')->withArticle(Article::find($id));
    }
    
   public function update($id,Request $request)  
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        
            $article = Article::find($id);
            $article->title = $request->get('title');
            $article->body = $request->get('body');

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('Save fails');
        }
    }
}
