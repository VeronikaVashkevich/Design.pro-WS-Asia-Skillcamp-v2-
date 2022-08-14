<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <header>
            @section('header')
                <div class="container">
                    <div class="menu">
                        <div class="logo"><a href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}"
                                                                              alt="logo" class="logo"></a></div>
                        <nav class="nav">
                            <a href="{{ route('index') }}" class="nav-link underline">Design.pro</a>
                            @auth()
                                @if (!Auth::user()->is_admin)
                                    <a href="{{ route('home') }}" class="nav-link underline">My requests</a>
                                @else
                                    <a href="{{ route('adminPanel') }}" class="nav-link underline">Admin Panel</a>
                                @endif
                                <a href="{{ route('logout') }}" class="nav-link underline">Logout</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link sign-in">Sign in</a>
                                <a href="{{ route('register')  }}" class="nav-link sign-up">Sign up</a>
                            @endauth
                        </nav>
                    </div>
                </div>
            @show
        </header>
        @yield('content')
    </div>
    <footer>
        <div class="container">
            <div class="footer">
                <div class="footer-contact">
                    <div class="social-media">
                        <a href="#"><img src="{{ asset('img/fb.png') }}" alt="facebook" class="media"></a>
                        <a href="#"><img src="{{ asset('img/inst.png') }}" alt="facebook" class="media"></a>
                        <a href="#"><img src="{{ asset('img/pint.png') }}" alt="facebook" class="media"></a>
                    </div>
                </div>
                <div class="footer-nav">
                    <a href="{{ route('index') }}" class="nav-link no-border underline">Design.pro</a>
                    @auth()
                        @if (!Auth::user()->is_admin)
                            <a href="{{ route('home') }}" class="nav-link underline">My requests</a>
                        @else
                            <a href="{{ route('adminPanel') }}" class="nav-link underline">Admin Panel</a>
                        @endif
                        <a href="{{ route('logout') }}" class="nav-link underline">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link no-border underline">Sign in</a>
                        <a href="{{ route('register') }}" class="nav-link no-border underline">Sign up</a>
                    @endauth
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
