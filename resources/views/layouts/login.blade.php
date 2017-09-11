<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Load Common Libraries -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('twbs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('twbs/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

    <script type="text/javascript" src="{{ asset('adminlte/dist/js/app.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-purple.min.css') }}">

    <title>@yield('title')</title>
  </head>
  <body class="hold-transition login-page">
    @yield('content')    
  </body>
</html>
