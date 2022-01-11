<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

    <body>
        <div class="min-w-full min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header>
                @include('layouts.header')
            </header>

            <!-- Page Content -->
            <main class="w-full bg-gray-100 my-5 flex-1">
                @yield('content')
            </main>
            <!-- Page Footing -->
            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>