<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepository;


class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;

    }

    public function index()
    {
        $category = $this->categoryRepository->getCategory();
        return view('category.index',compact('category'));
    }

    public function update($name)
    {
        $category = $this->categoryRepository->updateByName($name);
        return redirect()->route('category.index')->with('success',$name.'-修改成功');

    }
}
