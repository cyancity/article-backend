<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Article extends Model
{
    const CATE_1 = 1;
    const CATE_2 = 2;
    const CATE_3 = 3;

    protected $fillable = ['title', 'content', 'category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function scopePublished($query)
    {
        return $query->where('is_hidden', 'F');
    }
}
