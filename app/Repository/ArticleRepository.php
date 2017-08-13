<?php

namespace App\Repository;

use App\Article;
use App\Category;
use Illuminate\Support\Facades\DB;

class ArticleRepository
{
    public function byId($id)
    {
        return Article::find($id);
    }

    public function byIdWithTopics($id)
    {
        return Article::where('id',$id)->with(['topics'])->first();
    }

    public function create(array $attributes)
    {
        return Article::create($attributes);
    }

    public function getCate()
    {
        $category = DB::table('articles')->select('category')->distinct()->get()->toArray();
        
        return $category; 
    }
    public function byCategoryWithArticles($category)
    {
        return Category::where('category',$category)->first();
    }


    public function getArticle()
    {
        //published 是scopePublised方法
        return Article::paginate(15);
    }

    public function normalizeCategory($categories)
    {
        return collect($categories)->map(function ($category) {
            if (is_numeric($category)) {
                Category::find($category)->increment('article_count');
                return (int)$category;
            }

            $newCategory = Category::create(['title' => $category, 'article_count' => 1]);

            return $newCategory->id;
        })->toArray();
    }
}