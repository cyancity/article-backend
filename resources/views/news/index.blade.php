@extends('layouts.mob') @section('content')
    <div class="container-fluid all">

        <sidebar></sidebar>

        <div class="maincontent row" id="pagination">
            <div class="col-sm-12">
                <div class="jumbotron">
                    <h1>Sample Text Here</h1>
                </div>
                <div>
                    <ul class="list-group" style="display: inline-block">
                        <ul class="nav nav-tabs">
                            @foreach($items as $item)

                            <li class="active">
                                <a href="/news/tabs/{{$item->category}}" style="color: #130b79;">
                                    {{$item->category}}
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </ul>
                    <ul class="list-group">
                        @foreach($contents as $content)
                        <li class="list-group-item">
                            <a href="/article/$content->id" style="color: #130b79;">
                                {{ $content->title }}
                            </a>
                            <span class="pull-right">
                              {{ substr($content->created_at, 0,10) }}
                            </span>
                        </li>
                        @endforeach
                    </ul>

                    <div class="pull-right">
                        {{ $contents->render() }}
                    </div>
                </div>
                {{--<pagination></pagination>--}}

            </div>
        </div>
    </div>
    <a href="#top" id="goTop"><i class="fa fa-angle-up fa-3x"></i></a> @endsection