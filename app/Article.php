<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Article extends Model
{

    protected $fillable = ['title', 'content', 'category','cate_name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function scopePublished($query)
    {
        return $query->where('is_hidden', 'F');
    }
}
