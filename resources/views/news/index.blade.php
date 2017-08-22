@extends('layouts.mob') @section('content')
    <div>

        {{--<sidebar></sidebar>--}}
        <header class="clearfix">
            <div class="back"><a href="javascript:history.back(-1)"><i class="iconfont">&#xe600;</i></a></div>
            <div class="logo"><img src="/Public/images/top.png"/></div>
            <div class="nav">
                <div class="wrapper">

                    <div class="toolbar">
                        <div id="open-sb" class="menu-button menu-left"><a><i class="iconfont">&#xe606;</i></a></div>
                    </div>
                    <section class="sidebar">
                        <nav>
                            <h6><a href="/index.php/Home/" target="_blank">工商动态</a></h6>
                            <ul>
                                <li><a href="/index.php/Home/Index/index/id/50" target="_blank">新闻资讯</a></li>
                                <li><a href="/index.php/Home/Index/index/id/52" target="_blank">通知公告</a></li>
                                <li><a href="/index.php/Home/Index/index/id/60" target="_blank">工商大数据</a></li>
                            </ul>
                            <hr>
                            <h6>工商服务</h6>
                            <ul>
                                <li><a href="http://www.jsgsj.gov.cn:58888/province/" target="_blank">信用查询</a></li>
                                <li><a href="/index.php/Home/Mb/bszn" target="_blank">办事指南</a></li>
                                <li><a href="/index.php/Home/Mb/gzfw/id/62" target="_blank">公众服务</a></li>
                            </ul>
                            <hr>
                            <h6><a href="/index.php/Home/Mb/tsjb" target="_blank">消费维权</a></h6>
                            <ul>
                                <li><a href="/index.php/Home/Mb/tsjb" target="_blank">投诉举报</a></li>
                                <li><a href="/index.php/Home/Mb/listxw?id=58" target="_blank">维权资讯</a></li>
                                <li><a href="/index.php/Home/Mb/listxw?id=59" target="_blank">消费警示</a></li>
                            </ul>
                            <a class="bigphone"  href="tel:12315"><img src="/Public/images/phonebtn.png" width="584" height="165"></a>
                        </nav>
                    </section>
                </div>
                <script>
                    $( document ).ready(function() {
                        $.ajaxSetup({
                            cache: false
                        });
                        $( '.sidebar' ).simpleSidebar({
                            settings: {
                                opener: '#open-sb',
                                wrapper: '.wrapper',
                                animation: {
                                    duration: 500,
                                    easing: 'easeOutQuint'
                                }
                            },
                            sidebar: {
                                align: 'left',
                                width: 260,
                                closingLinks: 'a',
                            }
                        });
                    });
                </script>
            </div>
            <img src="/Public/images/by.png" class="by"/>
        </header>
        <div class="maincontent row" id="pagination">
            <div class="col-sm-12">
                <div class="jumbotron">
                    <h1>Sample Text Here</h1>
                </div>

                <div>
                    <div style="width: 100%;overflow:scroll;-webkit-overflow-scrolling:touch;">
                        <ul class="tabindex clearfix" style="width:500px;">
                            <ul>
                                @foreach($items as $item)

                                    <li>
                                        <a href="/news/tabs/{{$item->category}}">
                                            {{$item->category}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </ul>
                    </div>

                    <ul class="newslist">
                        @foreach($contents as $content)
                        <li>
                            <a href="/article/$content->id">
                                {{ $content->title }}
                            </a>
                            <span>
                              {{ substr($content->created_at, 0,10) }}
                            </span>
                        </li>
                        @endforeach
                    </ul>

                    <div>
                        {{ $contents->render() }}
                    </div>
                </div>
                {{--<pagination></pagination>--}}

            </div>
        </div>
    </div>

    <footer>苏州市工商行政管理局官方微信</footer>


    <script src="http://szgs.2500sz.com/Public/js/jquery-ui.min.js"></script>
    <script src="http://szgs.2500sz.com/Public/js/jquery.simplesidebar.js"></script>
    <script src="http://szgs.2500sz.com/Public/js/jquery.simplesidebar.js"></script>
    <script src="http://szgs.2500sz.com/Public/js/jquery-1.10.1.min.js"></script>

    <script type="text/javascript">
        var urlstr = location.href;
        var urlstatus=false;
        $("#tabindex a").each(function () {
            if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
                $(this).parent("li").addClass('cur'); urlstatus = true;
            } else {
                $(this).parent("li").removeClass('cur');
            }
        });
        if (!urlstatus) {$(this).parent("li").eq(0).addClass('cur'); }
    </script>
    <a href="#top" id="goTop"><i class="fa fa-angle-up fa-3x"></i></a> @endsection