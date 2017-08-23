@extends('layouts.mob') @section('content')
    <div class="container-fluid all">
        {{--<sidebar></sidebar>--}}

        <div class="maincontent row" id="pagination">
            <div style="padding-top: -8px;">
                <img src="http://img.jswmw.com/home/upLoad/slide/month_1209/201209251442427983.jpg" alt="">
            </div>
            <div class="col-sm-12">


                <div>
                    <ul class="list-group">
                        <ul class="nav nav-tabs">
                            @foreach($items as $item)
                                <li>
                                    <a href="/news/tabs/{{$item->category}}">
                                        {{$item->category}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </ul>

                    <ul class="list-group" style="margin: 0;padding: 0">
                        @foreach($contents as $content)
                            <li class="list-group-item">
                                <a href="/news/show/{{$content->id}}">
                                    {{ $content->title }}
                                    <span class="pull-right">
                                    {{ substr($content->created_at, 0,10) }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="pull-right">
                        {{ $contents->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<footer>镇江民生工商</footer>--}}
@endsection