<html>
    <head>
        <title>@yield('tittle')</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        @stack('css')
    </head>
    <body>
        <!-- <div id='header'>
            <h1>website xyz.com</h1>
        </div> -->
        <!-- @include('layouts.menu') -->
        <div id='content'>
            <div class="isi">
            @yield('content')
            </div>
        </div>
        <!-- <div id='footer'>
            <p>Copyright 2022</p>
        </div> -->
        @stack('js')
    </body>
</html>