<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
class Category extends Model
{
    
    protected $fillable = ['title', 'article_count'];

    public function article()
    {
        return $this->hasMany(Article::class)->orderBy('created_at','desc');
    }
}
