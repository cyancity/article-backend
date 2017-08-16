@extends('layouts.mob') @section('content')
<div class="container-fluid all">
    <div class="sidebar">
        <ul class="nav">
            <li class="has-sub">
                <a href="javascript:void(0);"><span>新闻资讯</span><i class="fa fa-caret-right fa-fw pull-right"></i></a>
                <ul class="sub-menu">
                    @foreach($articles as $article)
                    <li><a href="#"><i class="fa fa-circle-o fa-fw"></i>{{$article->title}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>

    <div class="maincontent row" id="pagination">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1>Sample Text Here</h1>
            </div>

            <pagination defaultItem="{{$items}}"></pagination>
            
        </div>
    </div>
</div>
<a href="#top" id="goTop"><i class="fa fa-angle-up fa-3x"></i></a> @endsection