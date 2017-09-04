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
        return view('news.index');
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
        $article = $this->articleRepository->byId($id);
        return view('news.show', compact('article','titles'));
    }

    public function sub($pid)
    {
        $categoryRepository = new CategoryRepository();
        $subTitles = $categoryRepository->getTabsById($pid);
        return response()->json($subTitles);
    }
}
