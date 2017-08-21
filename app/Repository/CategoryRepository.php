<?php

namespace App\Repository;

use App\Article;
use App\Category;


class CategoryRepository
{
    // No need any more
//    public function getCategoriesForTagging($request)
//    {
//        return Category::select(['id','title'])
//            ->where('title','like','%'.$request->query('q').'%')
//            ->get();
//    }
    public function byIdWithName($id)
    {
        return Category::find($id);
    }

    public function getCategory()
    {
        return Category::select(['title','id','url'])->get();
    }

    public function updateByName($old, $name)
    {
        // Update the specified category by the name
        if (isset($name)) {
            Category::where('title', $old)->update(['title' => $name]);
            Article::where('category', $old)->update(['category' => $name]);
            return;
        } else {
            abort('500', 'Update error');
        }
    }
}