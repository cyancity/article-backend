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

    public function getCellInfo($page)
    {
        return Article::select(['title','created_at'])->offset($page)->limit(8)->get();
    }

    public function getContentWithPaginationByItem($item)
    {
        $results = Article::where('category', $item)->latest()->paginate(7);
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
    
    public function checkCategory($category, $method)
    {
        switch($method){
            case 'store';
                    $is_set = Category::where('title', $category)->first();
                    if (isset($is_set)) {
                        Category::where('title',$category)->increment('article_count');
                    } else {
                        Category::create(['title' => $category, 'article_count' => 1]);
                    }
                    break;
            case 'update';
                    $is_set = Category::where('title', $category)->first();
                    if (!isset($is_set)) {
                        Category::create(['title' => $category, 'article_count' => 1]);
                    }
                    break;
        }
        // 逻辑似乎可以再优化一下
        return true;
    }

    public function findItems()
    {
        $categories = Article::select('title')->distinct()->get();
        $response = [
            'categories' => $categories,
            'totalCount' => count($categories)
        ];
        return $response;
    }
}