@extends("app.layouts.basico")

@section("titulo", "Cliente")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Clientes</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.cliente.create")}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin: auto;">
            <table border="1" width=100%>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td>
                                <form id="form_{{$cliente->id}}" action="{{route("app.cliente.destroy", ["cliente" => $cliente->id])}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    {{-- <button type="submit">Excluir</button> --}}
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route("app.cliente.edit", ["cliente" => $cliente->id])}}">Editar</a></td>
                            <td><a href="{{route("app.cliente.show", ["cliente" => $cliente->id])}}">Visualizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$clientes->appends($request)->links()}}
            {{$clientes->count()}} - Total de registros por página
            <br>
            {{$clientes->total()}} - Total de registros da consulta
            <br>
            {{$clientes->firstItem()}} - Número do 1º registro da página
            <br>
            {{$clientes->lastItem()}} - Número do último registro da página
            <br>
            Exibindo {{$clientes->count()}} clientes de {{$clientes->total()}} de {{$clientes->firstItem()}} a {{$clientes->lastItem()}}
        </div>
    </div>
</div>

@endsection
