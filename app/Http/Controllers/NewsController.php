<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
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
        $categoryRepository = new CategoryRepository();
        $titles = $categoryRepository->getTabsById(0);
        $subTitles = $categoryRepository->getTabsById(1);
        return view('news.index',compact('contents','items','titles','subTitles'));
    }

    public function tabs($tabs)
    {
        $items = $this->articleRepository->getItems();
        $contents = $this->articleRepository->getArticleByTabs($tabs);
        return view('news.index', compact('contents','items'));
    }

    public function show($id)
    {
        $categoryRepository = new CategoryRepository();
        $titles = $categoryRepository->getTabsById(0);
        $article = $this->articleRepository->byId($id);
        return view('news.show', compact('article','titles'));
    }
}
