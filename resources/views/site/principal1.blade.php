<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <h1>PÁGINA VIEW PRINCIPAL</h1>

        @if ($x > 0)
            <h1>{{$x}}</h1>

            <h1>{{$y}}</h1>
        @else
            <h1>SEM PARÂMETROS</h1>
        @endif

        @if (count($z) > 3)
            <h1>Maior que 3</h1>
        @endif

        @unless (count($z) > 3)
            <h1>MENOR QUE 3</h1>
        @endunless

        @isset($x)
            <h1>variável não definida</h1>
        @endisset

        @empty($x)
        <h1>variável vázia</h1>
        @endempty

        {{$x ? "existe123" : "Não existe"}}

        {{$x ?? ""}}

        @{{teste}}

        <ul>
            <li><a href="/principal">PRINCIPAL</a></li>
            <li><a href="/sobrenos">SOBRE-NÓS</a></li>
            <li><a href="/contato">CONTATO</a></li>
        </ul>
    </body>
</html>
