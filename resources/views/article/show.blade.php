@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $article->title }}
                            <a class="topic"> {{$article->category}} </a>
                    </div>

                    <div class="panel-body">
                        {!! $article->content !!}
                    </div>
                    <div class="actions">
                            <span class="edit"><a href="/article/{{$article->id}}/edit">编辑</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
