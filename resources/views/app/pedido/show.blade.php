@extends("app.layouts.basico")

@section("titulo", "Pedido")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Visualizar Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.pedido.index")}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin: auto;">
            <table border="1" width="100%">
                <tr>
                    <td>Cliente:</td>
                    <td>{{$pedido->cliente->nome}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
