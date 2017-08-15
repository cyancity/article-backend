@extends('layouts.mob') @section('content')
<div class="container-fluid all">
    <div class="sidebar">
        <ul class="nav">
            <li><a href="#">主页面</a></li>
            <li><a href="#">Form库</a></li>

            <li class="has-sub">
                <a href="javascript:void(0);"><span>导航选中演示</span><i class="fa fa-caret-right fa-fw pull-right"></i></a>
                <ul class="sub-menu">
                    <li><a href="#"><i class="fa fa-circle-o fa-fw"></i>&nbsp;left1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o fa-fw"></i>&nbsp;left2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o fa-fw"></i>&nbsp;left3及子页面</a></li>
                </ul>
            </li>
        </ul>
    </div>

        <script>
            $(document).ready(function () {
                if (location.hash) {
                    $('a[href=' + location.hash + ']').tab('show');
                }
                $(document.body).on("click", "a[data-toggle]", function (event) {
                    location.hash = this.getAttribute("href");
                });
            });
            $(window).on('popstate', function () {
                var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
                $('a[href=' + anchor + ']').tab('show');
            });
        </script>
        
    <div class="maincontent row" id="pagination">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1>Sample Text Here</h1>
            </div>
            <pagination></pagination>
            <ul class="list-group">
                <ul class="nav nav-tabs" id="myTab">
                    @foreach($articles as $article)
                    <li class="active"><a data-toggle="tab" href="#{{'cate'.$article->id}}">{{$article->category}}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($articles as $article)
                    <div class="tab-pane active" id="{{'cate'.$article->id}}">
                        <a href="show/{{ $article->id }}">
                            <li class="list-group-item">
                                <span class="badge">{{ $article->created_at }}</span> {{ $article->title }}
                            </li>
                        </a>
                        <div class="pull-right">
                            {{ $articles->render() }}
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </ul>
            
        </div>
    </div>
</div>
<a href="#top" id="goTop"><i class="fa fa-angle-up fa-3x"></i></a> @endsection