@extends('layouts.mob')
<style>
    img{ width: 100%; height: auto;max-width: 100%; display: block; }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $article->title }}
                        <br>
                        <a class="topic"> {{$article->category}} </a>
                    </div>

                    <div class="panel-body">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
