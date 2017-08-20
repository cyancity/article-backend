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

                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                        <label for="url">添加外链</label>
                        <input id="url" value="{{old('url')}} " name="url" class="form-control"
                            placeholder=""> @if ($errors->has('url'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span> @endif
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <select name="category" class="js-example-placeholder-multiple js-data-example-ajax form-control" multiple="multiple">
                        </select>
                        {{ $errors->has('content') ? ' has-error' : '' }}
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
@section('js')
    <script>
        $(document).ready(function() {
            function formatTopic (topic) {
                return "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" +
                topic.name ? topic.name : "Laravel"   +
                    "</div></div></div>";
            }

            function formatTopicSelection (topic) {
                return topic.name || topic.text;
            }

            $(".js-example-placeholder-multiple").select2({
                tags: true,
                placeholder: '选择相关话题',
                minimumInputLength: 2,
                // ajax: {
                //     url: '/api/topics',
                //     dataType: 'json',
                //     delay: 250,
                //     data: function (params) {
                //         return {
                //             q: params.term
                //         };
                //     },
                //     processResults: function (data, params) {
                //         return {
                //             results: data
                //         };
                //     },
                //     cache: true
                // },
                templateResult: formatTopic,
                templateSelection: formatTopicSelection,
                escapeMarkup: function (markup) { return markup; },
            });
        });
    </script>
@endsection
@endsection