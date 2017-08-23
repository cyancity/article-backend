@extends('layouts.mob')
<style>
    img{ width: 100%; height: auto;max-width: 100%; display: block; }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <article>
                    <h1>{{ $article->title }}</h1>
                    <h5>{{$article->category}}</h5>
                    <hr>
                </article>
                <div class="content">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
