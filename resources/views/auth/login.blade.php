<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    @include('layouts.links.css')

    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="row">

            <div class="center" style="margin-bottom: 80px">
                <img src="images/sesion.png" alt="Inicio de Sesion">
                <h5 style="font-family: 'Lobster', cursive; font-size: 50px">Inicio de Sesión</h5>
            </div>

                <form method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class=" {{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col l6 input-field">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                            <label for="email" class="">Correo electrónico</label>
                        </div>

                        @if ($errors->has('email'))
                            <span class=""> <strong>{{ $errors->first('email') }}</strong> </span>
                        @endif
                    </div>

                    <div class=" {{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="col l6 input-field">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password" >Contraseña</label>
                        </div>

                        @if ($errors->has('password'))
                            <span class=""> <b>{{ $errors->first('password') }}</b> </span>
                        @endif
                    </div>

                    <div class="col l12 center">
                        <button type="submit" class="btn btn-float "> <i class="fa fa-btn fa-sign-in"></i> Ingresar </button>
                        {{-- <a class="btn btn-float" href="{{ url('/password/reset') }}">Forgot Your Password?</a> --}}
                    </div>
                </form>

            </div>
        </div>
    </div>


    @include('layouts.links.js')

</body>
</html>


