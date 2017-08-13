<?php

namespace App\Repository;

use App\Article;
use App\Topic;

class ArticleRepository
{
    public function byIdWithTopics($id)
    {
        return Article::where('id',$id)->with(['topics'])->first();
    }

    public function create(array $attributes)
    {
        return Article::create($attributes);
    }

    public function getArticle()
    {
        //published 是scopePublised方法
        return Article::paginate(15);
    }

    public function getCategory($index)
    {
        $category = [
            Article::CATE_1 => '1',
            Article::CATE_2 => '2',
            Article::CATE_3 => '3',
        ];
        if (isset($index)) {
            return array_key_exists($index,$category) ? $category[$index] : $category[Article::CATE_1];
        }
    }
}