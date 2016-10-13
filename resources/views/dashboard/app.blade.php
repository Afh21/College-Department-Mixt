<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard | Administracion</title>

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    @include('layouts.links.css')

</head>
<body>

    <header>
        @include('dashboard.partials.nav')
    </header>

    <main>
        hola
    </main>

    <footer>

    </footer>

    @include('layouts.links.js')

    @yield('js')

    <script>
        $(document).ready(function(){
            $('.collapsible').collapsible();
        })
    </script>

</body>
</html>