<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <meta name="description" content="@yield('description')" />

  <!-- Scripts -->

  <!-- Fonts -->

  <!-- Styles -->
  <link rel="shortcut icon" href="{{ assets('favicon.ico') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ assets('css/base.css') }}" rel="stylesheet">
  <link href="{{ assets('css/font-size.css') }}" rel="stylesheet">
  <link href="{{ assets('css/base_r.css') }}" rel="stylesheet">
  <link href="{{ assets('css/select2.min.css') }}" rel="stylesheet" />

  @yield('pageCss')

  <!--FAVICON-->
  <link rel="icon" href="{{ assets('images/favicon_cms.ico') }}" sizes="any">

  <!--JS-->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="{{ assets('js/select2.min.js') }}"></script>

</head>

<body>

  @if( session('flash') )
    @foreach (session('flash') as $key => $item)
      <div class="alert alert-{{ $key }}">{{ session('flash.' . $key) }}</div>
    @endforeach
  @endif

  @yield('header')
  <main class="flexbox sp-st">
    @yield('content')
    @yield('sidebar')
  </main>
  @yield('footer')



</body>
<script src="{{ assets('js/admin/common.js') }}" type="text/javascript"></script>
@yield('pageJs')

</html>
