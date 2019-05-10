<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand logo" href="{{ url('/home') }}">
            {{ config('app.name', 'blogApp') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item"><a class="nav-link" href="{{url('home')}}">Home</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{url('posts/public')}}">Public Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('posts/friends')}}">Friends Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('posts')}}">My Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('contact')}}">Contact</a></li>
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <?php /*<li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif*/ ?>
                @else
                    <li class="nav-item"><a class="nav-link create_post_btn" href="/posts/create">New Post</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->access == 100)
                            <a class="dropdown-item" href="{{ action('UsersController@index') }}">
                                Users
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{ action('UsersController@show',auth()->user()->id) }}">
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
