<?php

namespace App\Http\Controllers;

use App\Category;
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
        // list all categories
        $categories = $this->categoryRepository->getCategory();
        return view('category.index',compact('categories'));
    }

    public function create()
    {
        // add category
        $lists = $this->categoryRepository->getOptions();
        return view('category.make',compact('lists'));
    }

    public function store(Request $request)
    {
        // store category
        $data = $request->input();
        $this->categoryRepository->create($data);
        $lists = $this->categoryRepository->getOptions();
        return redirect()->route('category.create', compact('lists'))->with('success','分类添加成功');
    }
    

    public function edit($id)
    {
        // edit
        $data = $this->categoryRepository->byIdWithName($id);
        return view('/category.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $name = $request->input('name');
        $old = $request->input('old');
        $this->categoryRepository->updateByName($old, $name);
        $categories = $this->categoryRepository->getCategory();
        return view('category.index',compact('categories'))->with('success',$name.'-修改成功');
    }

    public function getTabbarItems()
    {
        return $this->categoryRepository->getTabbarItems();
    }

    public function getNav()
    {
        // 获取所有父类
        $parent = $this->categoryRepository->getCategoryByPid(0);
        // 遍历出父类的id，放入数组
        for($i=0;$i<count($parent);$i++){
            $parentId[] = $parent[$i]['id'];
            $parentUrl[] = $parent[$i]['url'];
        }
        // 循环出结果
        for ($i=0;$i<count($parentId);$i++) {
            $item = [
                'id' => $parentId[$i], // 父类id
                'title' => implode('',$this->categoryRepository->byIdWithName($parentId[$i])[0]), // 父类名称, 转为字符串
                'url' => $parentUrl[$i],
                'subItem' => $this->categoryRepository->getCategoryByPid($parentId[$i]) // 父类所有的子类
            ];
            $response[] = $item;
        }
        return $response;
    }
}
