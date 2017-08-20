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
        $topic = $this->topicRepository->getTopic();
        return view('topic.index',compact('topic'));
    }

    public function update($name)
    {
        $topic = $this->topicRepository->updateByName($name);
        return redirect()->route('topic.index')->with('success',$name.'-修改成功');

    }
}
