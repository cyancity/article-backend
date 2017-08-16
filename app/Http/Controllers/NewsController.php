<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ArticleRepository;

class NewsController extends Controller
{
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->getArticle();
        // $category = $this->articleRepository->getCategory($articles['category']);
        $items = $this->articleRepository->findItems();

        return view('news.index',['articles' => $articles,'items' => $items]);
    }

    public function show($id)
    {
        echo $id;
    }
}
