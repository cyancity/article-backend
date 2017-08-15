<?php

namespace App\Repository;

use App\Category;
use App\Topic;


class CategoryRepository
{
    public function getCategoriesForTagging($request)
    {
        return Category::select(['id','title'])
            ->where('title','like','%'.$request->query('q').'%')
            ->get();
    }
}