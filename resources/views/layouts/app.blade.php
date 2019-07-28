<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PushChat</title>
    <!-- <title>{{ config('app.name', 'PUSHCHAT') }}</title> -->

    {!! MaterializeCSS::include_full() !!}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script>

        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => [
                'name' => auth()->check() ? auth()->user()->name : null
            ],
            'grup_id' => request()->id,
            'id_tujuan' => request()->id_tujuan,
            'user_id' => auth()->check() ? auth()->user()->id : null

        ]) !!};

    </script>
</head>

<body>
    <div id="app">
        
        <div id="navbar">
            <nav class="light-blue darken-3">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo">PushChat</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else

                                <li>
                                    <a href="{{ route('grup') }}">Grup</a>
                                </li>
                                <li>
                                    <a href="{{ route('private') }}">Private</a>
                                </li>
                                <li>
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                </li>

                                <li>
                                    <a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                                    <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> -->
                                        
                                    <!-- </div> -->
                                <!-- </li> -->
                            @endguest                        
                        </ul>
                    </div>
                </div>
                
            </nav>

            <ul class="sidenav" id="mobile-demo">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li>
                        <a href="{{ route('grup') }}">Grup</a>
                    </li>
                    <li>
                        <a href="{{ route('private') }}">Private</a>
                    </li>
                    <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>

                    <li>
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> -->
                            
                        <!-- </div> -->
                    <!-- </li> -->
                @endguest  
            </ul>
        </div>

        <main id="app" class="py-4">
            @yield('content')
        </main>
    </div>

    
     <script>
        // var elem = document.querySelector('.sidenav');
        // var instance = new M.Sidenav(elem);

        // with jquery

        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
     </script>
</body>
</html>
