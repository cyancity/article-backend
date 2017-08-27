<?php

namespace App\Repository;

use App\Article;
use App\Category;


class CategoryRepository
{
    // No need any more
//    public function getCategoriesForTagging($request)
//    {
//        return Category::select(['id','title'])
//            ->where('title','like','%'.$request->query('q').'%')
//            ->get();
//    }
    public function create($data)
    {
        return Category::create($data);
    }

    public function byIdWithName($id)
    {
        return Category::find($id);
    }

    public function getCategory()
    {
        return Category::all();
    }

    public function getData()
    {
        return $cates = Category::all()->toArray();
    }

    public function getTree($cates, $pid = 0)
    {
        $tree = [];
        foreach ($cates as $cate) {
            if ($cate['pid'] === $pid) {
                $tree[] = $cate;
                $tree = array_merge($tree, $this->getTree($cates, $cate['id']));
            }
        }
        return $tree;
    }

    public function setPrefix($data, $p = "|----")
    {
        $tree = [];
        $num = 1;
        $prefix= [0 => 1]; // pid为0，给一个prefix
        while ($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['pid'] !== $val['pid']) {
                    $num++;
                }
            }
            if (array_key_exists($val['pid'], $prefix)) {
                $num = $prefix[$val['pid']];
            }
            $val['title'] = str_repeat($p, $num).$val['title'];
            $prefix[$val['pid']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }

    public function getTabbarItems()
    {
        return Category::select('title','id')->where('pid','!=',0)->get();
    }

    public function getOptions()
    {
        $data = $this->getData();
        $tree = $this->getTree($data);
        $tree = $this->setPrefix($tree);
        $options = ['请添加顶级分类'];
        foreach ($tree as $cate) {
            $options[$cate['id']] = $cate['title'];
        }
        return $options;
    }

    // 查询后要加get()才能获取结果
    public function getTabsById($id)
    {
       return Category::select(['id','title','pid','url'])->where('pid',$id)->get()->toArray();
    }

    public static function findCategoryById($id)
    {
        $category = Category::select('title')->where('id',$id)->get()->toArray();
        $category = implode(current($category));
        return $category;
    }

    public function updateByName($old, $name)
    {
        // Update the specified category by the name
        if (isset($name)) {
            Category::where('title', $old)->update(['title' => $name]);
            return;
        } else {
            abort('500', 'Update error');
        }
    }

    public function getCategoryByPid($id)
    {
        return Category::where('pid',$id)->get()->toArray();
    }

}