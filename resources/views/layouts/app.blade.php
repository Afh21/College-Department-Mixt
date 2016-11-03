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
                <span class="center res">Resolucion N° ##### - AAAA/MM/D <br> Ministerio de Educación de la República de Colombia</span>
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
                                    <span>"</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad alias animi aperiam culpa dicta dolor dolorem eaque, nesciunt possimus quasi quia quod repellat repellendus sapiente sint temporibus vero voluptatum.
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi consequuntur deserunt exercitationem. Accusamus ex facere hic ipsum nemo officiis quibusdam? Aut impedit pariatur tempora voluptatibus. Amet commodi labore pariatur porro. <span>"</span>
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
                                    <span>"</span> Enseñando construiremos los profesionales del mañana
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </main>
    </div>


        <div id="contamos">
            <div class="row">
                <div class="col l12">
                    <div class="col l6">
                        <p >
                            <span>Además </span> contamos con una excelente planta académica, con la que nos sentimos
                            honrados de tener, ya que con su experiencia en la docencia, hacen de las clases diarias
                            un mundo lleno de conocimiento para nuestros niños y jovenes.
                        </p>
                    </div>
                    <div class="col l6 right">
                        <img src="images/contamos.png" alt="">
                    </div>
                </div>
            </div>
        </div>



    <footer>
        @yield('footer')
    </footer>

    @include('layouts.links.js')

    @yield('js')

    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        })
    </script>

</body>
</html>
