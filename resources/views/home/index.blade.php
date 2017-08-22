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
                        <form action="/home/change" method="post">
                            <label for="title">修改网站标题</label>
                            <input type="text" id="title" placeholder="修改网站标题">

                            <label for="title">修改网站标题</label>
                            <input type="text" id="title" placeholder="修改网站标题">

                            <label for="title">修改网站标题</label>
                            <input type="text" id="title" placeholder="修改网站标题">

                            <button type="submit" class="btn btn-success pull-right">修改</button>
                        </form>
                    </div>

                    <div>
                        <form action="/home/footer" method="post">
                            <label for="title">修改页脚</label>
                            <input type="text" id="title" placeholder="修改页脚">

                            <button type="submit" class="btn btn-success pull-right">修改</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection