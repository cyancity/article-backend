<?php

namespace App\Http\Controllers;

use App\Article;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;
use App\Repository\ArticleRepository;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->middleware('auth')->except(['show','getCellAndPagination','update']);
        $this->articleRepository = $articleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articleRepository->getArticle();
        // $category = $this->articleRepository->getCategory($articles['category']);
        return view('home',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryRepository = new CategoryRepository();
        $lists = $categoryRepository->getOptions();
        return view('article.make',compact('lists'));
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->input();
        $article = $this->articleRepository->create($data);
        // $article->category()->associate($category);
        return redirect()->route('article.show', [$article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->byId($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->byId($id);
        $categoryRepository = new CategoryRepository();
        $lists = $categoryRepository->getOptions();
        return view('article.edit')->with([
            'article' => $article,
            'lists' => $lists
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, $id)
    {
        $article = $this->articleRepository->byId($id);
        $article->update([
        'title' => $request->input('title'),
        'category' => $request->input('category'),
        'content' => $request->input('content')
        ]);
        return redirect()->route('article.show', [$article->id])->with('success','修改成功-'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->byId($id);
        if ($article->delete()) {
            return redirect()->back()->with('success','删除成功');
        }
        abort(500, 'Internal Problem');
    }

    public function getCellAndPagination(Request $request)
    {
        $id = $request->input('id');
        $page = $request->get('page');
        $pagination = $this->articleRepository->getCellAndPaginationByCateId($id,$page);
        return $pagination;
    }
}
