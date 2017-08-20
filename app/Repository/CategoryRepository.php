<?php

namespace App\Repository;

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
    public function getCategory()
    {
        return Category::select(['title'])->get();
    }

    public function updateByName($name)
    {
        // Update the specified category by the name
       return Category::where('title', $name)->update(['title'=>$name]);
    }
}