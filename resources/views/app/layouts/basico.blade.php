<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield("titulo")</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset("img/logo.png")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/estilo-basico.css') }}">
</head>

<body>
    @include("app.layouts._partials.topo")

    @yield("content")
</body>

</html>
