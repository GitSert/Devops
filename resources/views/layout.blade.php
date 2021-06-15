<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Alata" rel="stylesheet"/>

    @yield('head')
</head>

<body>

    <div class="navbar">
        <a href="/">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Products <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="/beers">Beer</a>
                <a href="/wines">Wines</a>
                <a href="/spirits">Spirits</a>
            </div>
        </div>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>


    @yield('content')
</body>

<footer>
    <div style="margin: 5%; color: #1a202c" id="shadow">
        <p font-weight: 400;>
            Contact me:<br /><br /><a href="mailto:sche0177@hz.nl">Send email</a>
        </p>
    </div>
</footer>
</html>
