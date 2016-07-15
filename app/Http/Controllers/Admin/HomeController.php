<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class HomeController extends Controller
{
    //
    public function index()  
    {
        return view('admin/article/index')->withArticles(Article::paginate(5));
    }
}
