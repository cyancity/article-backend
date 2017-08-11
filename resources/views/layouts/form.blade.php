<form action="/article" method="post">
  {!! csrf_field() !!}
  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title">标题</label>
    <input id="title" value="{{old('title')}}" type="text" name="title" class="form-control" placeholder="标题"> @if ($errors->has('title'))
    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span> @endif
  </div>
  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="category">分类</label>
    <input type="text" name="category" placeholder="分类" class="form-control"> @if ($errors->has('title'))
    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span> @endif
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
    <script id="container" name="content" type="text/plain"></script>
    @if ($errors->has('content'))
    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span> @endif
  </div>
  <button class="btn btn-success pull-right" type="submit">发布问题</button>
</form>