
@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="panel panel-default col-md-9">
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <strong>{{ Session::get('success') }}</strong>
                            </button>
                        </div>
                    @endif @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <strong>{{ Session::get('error') }}</strong>
                            </button>
                        </div>
                    @endif

                    <form action="/category/store" method="post" class="form-group">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" id="sel1" name="pid">
                                @foreach($lists as $id => $list )
                                <option value="{{$id}}">{{$list}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="title"> 分类名称</label>
                        <input id="title" type="text" class="form-control" name="title">
                        <label for="icon">图标</label>
                        <input id="icon" type="text" class="form-control" name="icon">

                        <button class="btn btn-success pull-right">提交</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
