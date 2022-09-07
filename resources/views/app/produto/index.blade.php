@extends("app.layouts.basico")

@section("titulo", "Produto")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de produtos</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.produto.create")}}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin: auto;">
            <table border="1" width=100%>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->fornecedor->nome}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->unidade_id}}</td>
                            <td>{{$produto->produtoDetalhe->comprimento ?? ""}}</td>
                            <td>{{$produto->produtoDetalhe->altura ?? ""}}</td>
                            <td>{{$produto->produtoDetalhe->largura ?? ""}}</td>
                            <td>
                                <form id="form_{{$produto->id}}" action="{{route("app.produto.destroy", ["produto" => $produto->id])}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    {{-- <button type="submit">Excluir</button> --}}
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route("app.produto.edit", ["produto" => $produto->id])}}">Editar</a></td>
                            <td><a href="{{route("app.produto.show", ["produto" => $produto->id])}}">Visualizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$produtos->appends($request)->links()}}
            {{$produtos->count()}} - Total de registros por página
            <br>
            {{$produtos->total()}} - Total de registros da consulta
            <br>
            {{$produtos->firstItem()}} - Número do 1º registro da página
            <br>
            {{$produtos->lastItem()}} - Número do último registro da página
            <br>
            Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}} de {{$produtos->firstItem()}} a {{$produtos->lastItem()}}
        </div>
    </div>
</div>

@endsection
