<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="html_admin">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Vino Administration') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>


    <body class="body_admin">

            <!-- Page Heading -->
            <header class="nav_admin">
                <h1>Administration : {{ Auth::user()->name}}</h1>
                <nav>
                    <a href="#">Membres</a>
                    <a href="#">Vins</a>
                    <a href="{{ route('scraper.index') }}">Scraper</a>
                    <a href="{{ route('logout') }}">Déconnexion</a>
                </nav>
            </header>

            <!-- Page Content -->
            <main class="main_admin">
               @yield("content")
            </main>      

    </body>
</html>