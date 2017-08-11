@extends('layouts.app') @section('content') @include('vendor.ueditor.assets')
<div class="container">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">新闻编辑器</div>

                <div class="panel-body">
                    @include('layouts.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection