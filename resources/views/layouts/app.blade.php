<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'blogApp') }}</title>
    <!-- <script src="resources\js\tinymce-vue.min.js"></script> -->
    {{-- <script src="{{asset('js/tinymce-vue.min.js')}}"></script> --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('header')

</head>
<body>
    <div id="app">
        @guest
            @include('inc.navbar_guest')
        @else
            @include('inc.navbar')
        @endguest
        
        <main class="py-4">
            <div class="container">
            @include('inc.messages')
            </div>
            @yield('content')
        </main>
    </div>
    
    @yield('scripts')
</body>
</html>
