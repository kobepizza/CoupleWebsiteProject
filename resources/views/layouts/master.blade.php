<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi Amore</title>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Funnel+Display:wght@300..800&display=swap" rel="stylesheet">
                
    </head>

    <body>
         @include('layouts.header')
            @yield('content')

        <footer>
            @include('layouts.footer')
        </footer>
    </body>


    <style>
    body {
        font-family: "Funnel Display", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;

        
    }
    </style>
</html>

