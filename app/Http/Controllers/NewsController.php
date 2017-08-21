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

        $items = $this->articleRepository->getItems();
        $contents = $this->articleRepository->getArticle();
        return view('news.index',compact('contents','items'));
    }

    public function tabs($tabs)
    {
        $items = $this->articleRepository->getItems();
        $contents = $this->articleRepository->getArticleByTabs($tabs);
        return view('news.index', compact('contents','items'));
    }

    public function show($id)
    {
        echo $id;
    }
}
