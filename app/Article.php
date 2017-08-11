<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const CATE_1 = 1;
    const CATE_2 = 2;
    const CATE_3 = 3;

    protected $fillable = ['title', 'content', 'category'];

    public function scopePublished($query)
    {
        return $query->where('is_hidden', 'F');
    }
}
