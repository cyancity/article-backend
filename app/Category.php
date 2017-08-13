<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['title', 'article_count'];

    public function article()
    {
        return $this->hasMany(App\Article)->orderBy('created_at','desc');
    }
}
