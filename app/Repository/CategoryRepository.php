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
            return Category::where('title', $old)->update(['title' => $name]);
        } else {
            abort('500', 'Update error');
        }
    }
}