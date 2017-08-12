<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Repository\ArticleRepository;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->middleware('auth')->except(['index', 'show','vue']);
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
        
        return view('home',['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.make');
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
        $article = new Article();
        if ($article->create($data)) {
            return redirect('/home')->with('success','添加成功');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $article = Article::find($id);
        if($request->isMethod('post')) {
            $data = $request->input();
            $article->title = $data['title'];
            $article->category = $data['category'];
            $article->content = $data['content'];
            if ($article->save()) {
                return redirect('/')->with('success','修改成功-'.$id);
            }
        }
        return view('article.edit',['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        
        return view('article.edit',['article' => $article]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, $id)
    {
        $data = $article->find($id);
        if ($data->delete()) {
            return redirect()->back()->with('success','删除成功');
        }
    }

    public function vue()
    {
        $articles = $this->articleRepository->getArticle();
        return response()->json($articles);
    }
}
