<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', '镇江民生工商') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/mob.css') }}" rel="stylesheet">
  <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <div id="mob">
    <nav class="navbar navbar-inverse" style="    margin-bottom: 0px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/news">镇江民生工商</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">工商动态 <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">新闻咨询</a></li>
                <li class="divider"></li>
                <li><a href="#">通知公告</a></li>
                <li class="divider"></li>
                <li><a href="#">工商大数据</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">工商服务 <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">信用查询</a></li>
                <li class="divider"></li>
                <li><a href="#">办事指南</a></li>
                <li class="divider"></li>
                <li><a href="#">公众服务</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">消费维权 <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">投诉举报</a></li>
                <li class="divider"></li>
                <li><a href="#">维权咨询</a></li>
                <li class="divider"></li>
                <li><a href="#">消费警示</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    @yield('content')
  </div>
  <script src="{{ mix('js/mob.js') }}"></script>

</body>

</html>