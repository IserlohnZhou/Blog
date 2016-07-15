<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use App\Article;

class TagsController extends Controller
{
    public function index()  
    {
        return view('admin/tags/index')->withArticles(Article::with('hasManyTags')->get());
    }
    
    public function store(Request $request)  
    {
        $this->validate($request, [
            'tag_name' => 'required',
        ]);

        foreach (Tag::where('article_id','=',$request->get('article_id'))->get() as $check_name ){
             if ($check_name->tag_name==$request->get('tag_name')) {
                 return redirect()->back()->withInput()->withErrors('Tags duplicate!');
             }
        }              
        $tag= new Tag;
        $tag->tag_name = $request->get('tag_name');
        $tag->article_id = $request->get('article_id');

        if ($tag->save()) {
            return redirect('admin/tags');
        } 
        else {
            return redirect()->back()->withInput()->withErrors('Add fails!');
        }
    }
    public function destroy($id)   //delete articles
    {
        Tag::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('Delete completed!');
    }
    
}