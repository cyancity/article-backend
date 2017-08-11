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

    public function byId($id)
    {
        return Article::find($id);
    }

    public function getArticle()
    {
        //published 是scopePublised方法
        return Article::paginate(15);
    }
    
    public function normalizeTopics(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if (is_numeric($topic)) {
                // 每添加一次话题，该话题的问题数加一
                Topic::find($topic)->increment('article_count');
                return (int)$topic;
            }
            // 若没有该话题，则新建一个
            $newTopic = Topic::create(['name' => $topic,'article_count' => 1]);
            return $newTopic->id;
        })->toArray();
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