<?php

namespace App\Repository;

use App\Category;
use App\Topic;


class CategoryRepository
{
    public function byIdWithTopics($id)
    {
        return Category::where('id',$id)->with(['topics'])->first();
    }

    public function byCategoryWithArticles($category)
    {
        return Category::where('category',$category)->first();
    }

    public function create(array $attributes)
    {
        return Category::create($attributes);
    }


    public function getCategoriesForTagging($request)
    {
        return Category::select(['id','title'])
            ->where('title','like','%'.$request->query('q').'%')
            ->get();
    }
}