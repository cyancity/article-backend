@extends('layouts.app') @section('content')

<div class="container">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加主题
                </div>

                <div class="panel-body">

                    <form action="/topic" method="post">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="topic">主题名</label>
                            <input id="topic" value="{{old('topic')}}"  name="topic" class="form-control"
                                   placeholder="请添加主题"> @if ($errors->has('topic'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('topic') }}</strong>
                                    </span> @endif
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="url">外链</label>
                            <input id="url" value="{{old('url')}}" type="text" name="url" class="form-control" placeholder="请添加外链">
                            <strong>{{ $errors->first('url') }}</strong>
                        </div>

                        <button class="btn btn-success pull-right" type="submit">添加主题</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection