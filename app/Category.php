<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['title', 'article_count'];

    public function article()
    {
        return $this->hasMany(Article::class)->orderBy('created_at','desc');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
