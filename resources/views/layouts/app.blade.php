<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Colegio Departamental Mixto</title>

    @include('layouts.links.css')

</head>
<body>

    <header>
        @include('layouts.partials.nav')

            <div class="col l6 center" style="margin-top: 3em">
                <img src="/images/school.png" alt="">
            </div>
            <div class="col l6 center">
                <h5>Colegio Departamental Mixto - Pto Salgar</h5>
            </div>

    </header>

    <div class="container">
        <main>
            @yield('content')
        </main>

        <footer>
            @yield('footer')
        </footer>
    </div>

    @include('layouts.links.js')

    @yield('js')

    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        })
    </script>

</body>
</html>
