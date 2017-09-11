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
        // Render home.blade for displaying all articles
        return Article::paginate(10);
    }

    public function getCellAndPaginationByCateId($id, $page)
    {
        // 每页显示分页显示的条数
        $cellNum = 10;
        // Return the specified item content with pagination
        $data = Article::select(['id','title','created_at'])->where('category',$id)->offset($page)->limit(10)->latest()->get();
        $results = Article::where('category', $id)->latest()->paginate($cellNum);
        $response = [
            'pagination' => [
                'total' => $results->total(),
                'per_page' => $results->perPage(),
                'current_page' => $results->currentPage(),
                'last_page' => $results->lastPage(),
                'from' => $results->firstItem(),
                'to' => $results->lastItem()
            ],
            'data' => $data
        ];
        return $response;
    }

    public function getTabItems()
    {
        return $categories = Category::select('pid')->where('pid',0)->distinct()->get();
    }
}