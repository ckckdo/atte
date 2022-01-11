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
<style>
  .container{
    text-align:center;
    width:100%;
  }
  .form-atte{
    width:70%;
    margin:0 auto;
  }
  .form-atte--input{
    width:95%;
    height:40px;
    border:1px solid #888;
    border-radius:5px;
    background:#f8fafc;
    margin-top:10px;
    margin-bottom:20px;
    padding:20px;
  }
  .title-auth{
    font-size:24px;
    text-align:center;
  }
  .btn-input{
    width:95%;
    height:40px;
    border:1px solid #0e6efd;
    border-radius:5px;
    background:#0e6efd;
    color:white;
    margin-top:10px;
    margin-bottom:20px;
  }
  .form-atte p{
    font-size:12px;
    color:#888;
    margin:0;
  }
  .btn-other{
    font-size:12px;
    color:#0e6efd;
  }
  @media (min-width: 1200px) {
    .form-atte{
    width:35%;
    margin:0 auto;
  }
    }
</style>

    <body>
        <div class="min-w-full min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header>
                @include('layouts.header-main')
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