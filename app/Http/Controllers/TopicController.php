<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TopicRepository;

class TopicController extends Controller
{
    protected $topic;

    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }

    public function index()
    {
        $topics = $this->topicRepository->getTopic();
        return view('topic.index',compact('topics'));
    }

    public function create()
    {
        return view('topic.make');
    }

    public function update($old, $name)
    {
        $this->topicRepository->updateByName($old, $name);
        return redirect()->route('topic.index')->with('success',$name.'-修改成功');
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $topic = $this->topicRepository->create($data);
        $topics = $this->topicRepository->getTopic();
        return view('topic.index',compact('topics'));
    }

    public function destoty($id)
    {
        $topic = $this->topicRepository->byId($id);
        if ($topic->delete()) {
            return redirect()->back()->with('success','删除成功');
        }
        abort(500, 'Internal Problem');
    }
}
