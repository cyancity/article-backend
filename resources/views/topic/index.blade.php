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
                    <div>
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <td>主题</td>
                                <td>外链</td>
                                <td>操作</td>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($topics as $topic)
                                <tr>
                                    <th>{{ $topic->id }}</th>
                                    <td>{{ $topic->topic }}</td>
                                    <td>{{ $topic->url }}</td>
                                    <td>{{ $topic->is_hidden }}</td>
                                    <td>
                                        <a href="/topic/edit/{{$topic->id}}">修改</a>
                                        <a href="/topic/destory/{{$topic->id}}">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection