<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model  
{
    public function hasManyComments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }
    public function hasManyTags()
    {
        return $this->hasMany('App\Tag', 'article_id', 'id');
    }
}