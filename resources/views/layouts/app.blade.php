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
                <h5 id="title">Colegio Departamental Mixto - Pto Salgar</h5>
            </div>
            <hr>
    </header>


    <div class="container">

        <main>
            @yield('content')

            <div id="etiquetas">
                <div class="row">
                    <div class="col l12">
                        <div class="col l4">
                            <div class="center">
                                <img src="/images/mision.png" alt="">
                            </div>
                            <div id="text">
                                <h4>Mision</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad alias animi aperiam culpa dicta dolor dolorem eaque, nesciunt possimus quasi quia quod repellat repellendus sapiente sint temporibus vero voluptatum.
                                </p>
                            </div>
                        </div>
                        <div class="col l4">
                            <div class="center">
                                <img src="/images/vision.png" alt="">
                            </div>
                            <div id="text">
                                <h4>Vision</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi consequuntur deserunt exercitationem. Accusamus ex facere hic ipsum nemo officiis quibusdam? Aut impedit pariatur tempora voluptatibus. Amet commodi labore pariatur porro.
                                </p>
                            </div>
                        </div>

                        <div class="col l4">
                            <div class="center">
                                <img src="/images/filosofia.png" alt="">
                            </div>
                            <div id="text">
                                <h4>Filosofia</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus et expedita explicabo, fugit in ipsa nihil quaerat totam voluptates. Dolorem error fugit hic ipsa iusto libero modi necessitatibus? Cupiditate!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
