<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi Amore</title>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
         
    </head>

    <body>
         @include('layouts.header')
            @yield('content')

        <footer>
            @include('layouts.footer')
        </footer>
    </body>
</html>