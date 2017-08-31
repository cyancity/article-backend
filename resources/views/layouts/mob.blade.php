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
  <style>
    img{ width: 100%; height: auto;max-width: 100%; display: block; }
  </style>
</head>

<body>
  <div id="mob">
    <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/news">镇江民生工商</a>
        </div>

        <tab></tab>

      </div>
    </nav>

    @yield('content')
  </div>
  <script src="{{ mix('js/mob.js') }}"></script>

</body>

</html>