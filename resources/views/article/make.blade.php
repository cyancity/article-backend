@extends('layouts.app') @section('content')@include('vendor.ueditor.assets')

<div class="container">
<div class="row">
    @include('layouts.sidebar')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                新闻编辑器
            </div>
            <div class="panel-body">
                <form action="{{url('/article')}}" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">标题</label>
                        <input id="title" value="{{old('title')}}"  name="title" class="form-control"
                            placeholder="标题"> @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> @endif
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <label for="sel1">Select list:</label>
                        <select class="form-control" id="sel1" name="category">
                            @foreach($lists as $id => $list )
                                <option value="{{$id}}">{{$list}}</option>
                            @endforeach
                        </select>
                        <strong>{{ $errors->first('category') }}</strong>
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function () {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                            });
                        </script>

                        <!-- 编辑器容器 -->
                        <script id="container" name="content" type="text/plain">
                            {!! old('content') !!} </script>
                        @if ($errors->has('content'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                        </span> 
                        @endif
                    </div>
                    <button class="btn btn-success pull-right" type="submit">发布问题</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection