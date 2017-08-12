@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        @include('layouts.sidebar')

        <div class="panel panel-default col-md-9">
            <div class="panel-body">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <strong>{{ Session::get('success') }}</strong>
                </button>
                </div>
                @endif @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <strong>{{ Session::get('error') }}</strong>
                </button>
                </div>
                @endif
                <div>
                    <table class="table table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>编号</th>
                                <td>标题</td>
                                <td>分类</td>
                                <td>是否隐藏</td>
                                <td>发布时间</td>
                                <td>最后修改时间</td>
                                <td style="120">操作</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <th scope="row">{{ $article->id }}</th>
                                <td>{{ $article->title }}</td>
                                <td>category</td>
                                <td>{{ $article->is_hidden }}</td>
                                <td>{{ date('Y-m-d', $article->created_at) }}</td>
                                <td>{{ date('Y-m-d', $article->updated_at) }}</td>
                                <td>
                                    <a href="">详情</a>
                                    <a href="/article/update/{{$article->id}}">修改</a>
                                    <a href="/article/delete/{{$article->id}}">删除</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pull-right">
                    {{ $articles->render() }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection