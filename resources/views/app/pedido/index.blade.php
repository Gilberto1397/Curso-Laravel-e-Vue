@extends("app.layouts.basico")

@section("titulo", "Pedido")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Pedidos</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.pedido.create")}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin: auto;">
            <table border="1" width=100%>
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th>Quantidade de Produtos</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id}}</td>
                            <td>{{$pedido->cliente->nome}}</td>
                            <td>{{count($pedido->produtos)}}</td>
                            <td><a href="{{route("app.pedido.show", ["pedido" => $pedido->id])}}">Visualizar</a></td>
                            <td><a href="{{route("app.pedido-produto.create", ["pedido" => $pedido->id])}}">Adicionar Produtos</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" action="{{route("app.pedido.destroy", ["pedido" => $pedido->id])}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    {{-- <button type="submit">Excluir</button> --}}
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route("app.pedido.edit", ["pedido" => $pedido->id])}}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$pedidos->appends($request)->links()}}
            {{$pedidos->count()}} - Total de registros por página
            <br>
            {{$pedidos->total()}} - Total de registros da consulta
            <br>
            {{$pedidos->firstItem()}} - Número do 1º registro da página
            <br>
            {{$pedidos->lastItem()}} - Número do último registro da página
            <br>
            Exibindo {{$pedidos->count()}} pedidos de {{$pedidos->total()}} de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}}
        </div>
    </div>
</div>

@endsection
