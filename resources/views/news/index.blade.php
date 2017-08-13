@extends('layouts.mob') @section('content')
<div class="container-fluid all">
    <div class="sidebar">
        <ul class="nav">
            <li><a href="index.html">主页面</a></li>
            <li><a href="form.html">Form库</a></li>
            <li><a href="message.html">Message库</a></li>
            <li><a href="ui.html">UI库</a></li>
            <li><a href="animate.html">Animate库</a></li>
            <li><a href="carousel.html">Carousel库</a></li>
            <li><a href="chart.html">Chart库</a></li>
            <li class="has-sub">
                <a href="javascript:void(0);"><span>导航选中演示</span><i class="fa fa-caret-right fa-fw pull-right"></i></a>
                <ul class="sub-menu">
                    <li><a href="left1.html"><i class="fa fa-circle-o fa-fw"></i>&nbsp;left1</a></li>
                    <li><a href="left2.html"><i class="fa fa-circle-o fa-fw"></i>&nbsp;left2</a></li>
                    <li><a href="left3.html"><i class="fa fa-circle-o fa-fw"></i>&nbsp;left3及子页面</a></li>
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
        
    <div class="maincontent row">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1>Sample Text Here</h1>
            </div>
            <ul class="list-group">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#profile">Profile</a></li>
                    <li><a data-toggle="tab" href="#messages">Messages</a></li>
                    <li><a data-toggle="tab" href="#settings">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">home</div>
                    <div class="tab-pane" id="profile">profile</div>
                    <div class="tab-pane" id="messages">messages</div>
                    <div class="tab-pane" id="settings">settings</div>
                </div>
                @foreach($articles as $article)
                <a href="show/{{ $article->id }}">
                    <li class="list-group-item">
                        <span class="badge">{{ date('Y-m-d', $article->created_at) }}</span> {{ $article->title }}
                    </li>
                </a>
                @endforeach
            </ul>
            <div class="pull-right">
                {{ $articles->render() }}
            </div>
        </div>
    </div>
</div>
<a href="#top" id="goTop"><i class="fa fa-angle-up fa-3x"></i></a> @endsection