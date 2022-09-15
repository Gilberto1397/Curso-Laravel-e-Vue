@extends("app.layouts.basico")

@section("titulo", "Cliente")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Visualizar Cliente</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.cliente.index")}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin: auto;">
            <table border="1" width="100%">
                <tr>
                    <td>Nome:</td>
                    <td>{{$cliente->nome}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
