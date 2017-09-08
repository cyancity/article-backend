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
        $categories = $this->categoryRepository->getTreeList();
        return view('category.index')->with('categories',$categories);
    }

    public function create()
    {
        // add category
        $lists = $this->categoryRepository->getOptions();
        return view('category.make')->with('lists',$lists);
    }

    public function deleteCate($id)
    {
        $data = $this->categoryRepository->byIdFindPid($id);
        $article = $this->categoryRepository->byId($id)->articles()->first();
        $categories = $this->categoryRepository->getTreeList();
        if (isset($data) || isset($article)) {
            return redirect('category')->with([
                'error' => '当前分类分类下存在文章或者分类',
                'categories' => $categories
            ]);
        } else {
            $this->categoryRepository->byId($id)->delete();
            return redirect('category')->with([
                'success' => '删除成功',
                'categories' => $categories
            ]);
        }
    }

    public function store(Request $request)
    {
        // store category
        $data = $request->input();
        $this->categoryRepository->create($data);
        $lists = $this->categoryRepository->getOptions();
        return redirect('category/create')->with([
            'lists' => $lists,
            'success' => '添加成功'
        ]);
    }


    public function edit($id)
    {
        // edit
        $data = $this->categoryRepository->byIdWithName($id);
        return view('category.edit')->with('data',$data);
    }

    public function update(Request $request)
    {
        $name = $request->input('name');
        $old = $request->input('old');
        $this->categoryRepository->updateByName($old, $name);
        $categories = $this->categoryRepository->getTreeList();
        return view('category.index',compact('categories'))->with('success',$name.'-修改成功');
    }
    public function editUrl($id)
    {
        $data = $this->categoryRepository->byIdWithName($id);
        return view('category.edit')->with('data',$data);
    }

    public function updateUrl(Request $request)
    {
        $url = $request->input('url');
        $id = $request->input('id');
        $this->categoryRepository->updateByUrl($id, $url);
        $categories = $this->categoryRepository->getCategory();
        return view('category.index')->with([
            'categories' => $categories,
            'success' => '修改成功'
        ]);
    }

    /**
     * [getTabbarItems description]
     * @param  Request $request [description]
     * @return [type]           [description]
     * 如果需要接受参数，则注入Request，需求只要求提取三个item，所以写固定的即可
     */
    public function getTabbarItems()
    {
        // $id = $request->get('id');
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
//            dd((string)$this->categoryRepository->byIdWithCateName($parentId[$i]));
            $item = [
                'id' => $parentId[$i], // 父类id
                'title' => $this->categoryRepository->byIdWithName($parentId[$i])->title, // 父类名称, 转为字符串
                'url' => $parentUrl[$i],
                'subItem' => $this->categoryRepository->getCategoryByPid($parentId[$i]) // 父类所有的子类
            ];
            $response[] = $item;
        }
        return $response;
    }
}
