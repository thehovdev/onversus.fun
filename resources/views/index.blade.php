<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>


        @include('includes.header')

    </head>
    <body>
        <div id="app">
            <app-navbar></app-navbar>
            <div class="container">
                @yield('content')
            </div>
        </div>


        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
