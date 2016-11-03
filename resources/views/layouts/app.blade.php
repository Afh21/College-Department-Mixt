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
                                <h4>Misión</h4>
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
                                <h4>Visión</h4>
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
                                <h4>Filosofía</h4>
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

    <div class="container">

        <div id="ubicacion">
            <h4 class="center">Ubicanos..</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d3598.7082584053187!2d-74.65493068320242!3d5.465251842557875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x8e40de93559a64cf%3A0x8a962faca57ede09!2sAeropuerto+Base+A%C3%A9rea+Germ%C3%A1n+Olano%2C+Cundinamarca!3m2!1d5.465923999999999!2d-74.65755!4m5!1s0x8e40de8d26f578db%3A0xb1ba4bba08d7bdd4!2sColegio+Dpeartamental+Mixto%2C+Puerto+Salgar+-+Cundinamarca!3m2!1d5.4653778!2d-74.6493691!5e1!3m2!1ses-419!2sco!4v1478198227879" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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
