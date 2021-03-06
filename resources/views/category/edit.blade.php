@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="panel panel-default col-md-9">
                <div class="panel-body">
                    <div>
                        <form action="/category/update" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$data->title}}" name="old">
                            <label for="name">修改分类名称</label>
                            <input id="name" type="text" value="{{$data->title}}" class="form-control" name="name">
                            <button type="submit" class="btn btn-primary pull-right">提交修改</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection