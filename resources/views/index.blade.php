<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'blogApp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="logo main">{{ config('app.name', 'blogApp') }}</div>
            <section id="blogApp_news" class="container">

            </section>
            <section id="login_panel" class="container">
                    @guest
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <h4>Welcome {{ Auth::user()->name }}. You can see your home page <a href="{{ route('home') }}">here!</a></h4>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </section>
        </main>
    </div>
</body>
</html>
