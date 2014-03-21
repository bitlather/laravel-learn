<!DOCTYPE html>
<html>
    {{-- Comment: you cannot have periods in layout file name before .blade.php --}}
    {{-- Using two squiggly brackets echoes the contents. --}}
    {{-- Three squiggly brackets echoes escaped contents. --}}
    {{-- Use three squiggly brackets for all user input. --}}
    <head>
        <title>@yield('title', 'Default App Title')</title>
    </head>
    <body>
        <ul>
        @if(Auth::check())
            <li><a href="/account">Hi {{{ Auth::user()->first_name }}}!</a>
            <li><a href="/log-out">Log out</a></li>
        @else
            <li><a href="/sign-up">Sign up</a></li>
            <li><a href="/log-in">Log in</a></li>
        @endif
        </ul>
        <hr />

        @yield('content')

        <hr />
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/account">My Account</a></li>
            <li><a href="/sign-up">Sign up</a></li>
            <li><a href="/log-in">Log in</a></li>
            <li><a href="/log-out">Log out</a></li>
        </ul>
    </body>
</html>