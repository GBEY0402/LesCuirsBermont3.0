<!DOCTYPE html>
<html>
    <head>
        <title>Les Cuirs Bermont</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}" >
        <link rel="stylesheet" href="{!! asset('css/bootstrap-theme.min.css') !!}">
        <script src="{!! asset('js/jquery-2.1.4.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
      
    </head>
    <body>
        @include('shared.navbar')
        @yield('content')
        <div class="container">
            <div class="content">
                <div class="title">Vue INVENTAIRE! Vous etes un {!! $role !!}</div>
            </div>
        </div>
    </body>
</html>
