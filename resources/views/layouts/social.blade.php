<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Intrasocial') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('social/css/line-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('social/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/social.css') }}" rel="stylesheet">
</head>


<body>
	<div class="wrapper">
    @include('partials.header')
    <main>
        <div class="main-section">
          <div class="container">
              <div class="main-section-data">
                  <div class="row">
                      @include('partials.left-sidebar')
                        @yield('content')
                      @include('partials.right-sidebar')
                  </div>
              </div>
          </div>
        </div>
    </main>
	</div><!--theme-layout end-->

<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/social.js') }}" ></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.js') }}" ></script>
{{-- jquery.mCustomScrollbar --}}
</body>
</html>
