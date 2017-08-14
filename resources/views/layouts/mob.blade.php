<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'News') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataurl.css') }}" rel="stylesheet">
  <link href="{{ asset('css/default.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">   -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/hammer.min.js') }}"></script>
  <script src="{{ asset('js/jquery.extend.js') }}"></script>
  <script src="{{ asset('js/jquery.hammer.js') }}"></script>
  <script src="{{ asset('js/pace.min.js') }}"></script>
  <script src="{{ asset('js/scrolltopcontrol.js') }}"></script>
  <script src="{{ asset('js/default.js') }}"></script>

</head>

<body>
  <div id="app">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle show pull-left" data-target="sidebar">
                    <span class="sr-only">展开侧栏</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
          <a class="navbar-brand" href="index.html">镇江工商</a>
        </div>
      </div>
    </nav>

    @yield('content')
  </div>

  <!-- Scripts -->


</body>

</html>