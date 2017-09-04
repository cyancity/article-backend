@extends('layouts.mob')
<style>
    img{ width: 100%; height: auto;max-width: 100%; display: block; }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <h2 style="text-align: center">{{ $article->title }}</h2>
                    <h5 style="float: right">发布时间 {{substr($article->created_at,0,10)}}</h5>
                </div>

                <div class="content">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
