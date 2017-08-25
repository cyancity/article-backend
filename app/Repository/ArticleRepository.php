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

    public function getArticleByTabs($tabs)
    {
        // Render home.blade for displaying specified articles
        return Article::where('category', $tabs)->paginate(10);
    }

    public function getCellInfo($page)
    {
        return Article::select(['title','created_at'])->offset($page)->limit(10)->get();
    }

    public function getContentsWithPaginationByItem($item)
    {
        // Return the specified item content with pagination

        $results = Article::where('category', $item)->latest()->paginate(10);
        // response needs title, time and pagination data, missing title and time, so add
        $response = [
            'pagination' => [
                'total' => $results->total(),
                'per_page' => $results->perPage(),
                'current_page' => $results->currentPage(),
                'last_page' => $results->lastPage(),
                'from' => $results->firstItem(),
                'to' => $results->lastItem()
            ],
            'data' => $results
        ];
        return $response;
    }

    public function findItems()
    {
        // Return All categories list
        $categories = Article::select('category')->distinct()->get();
        // $categories = json_encode($categories);
        $response = [
            'category' => $categories
        ];
        return $response;
    }

    public function getItems()
    {
        return $categories = Article::select('category')->distinct()->get();

    }
}