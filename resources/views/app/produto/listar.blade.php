@extends("app.layouts.basico")

@section("titulo", "Produtos")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Produto - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.produto.create")}}">Novo</a></li>
            <li><a href="{{route("app.produto.buscar")}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin: auto;">
            <table border="1" width=100%>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
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
                        <tr>
                            <td colspan="6">
                                Lista de Produtos
                                <table border="1" style="margin: 20px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fornecedor->produtos as $key => $produto)
                                        <tr>
                                            <td>{{$produto->id}}</td>
                                            <td>{{$produto->nome}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{$fornecedores->appends($request)->links()}}
            {{$fornecedores->count()}} - Total de registros por página
            <br>
            {{$fornecedores->total()}} - Total de registros da consulta
            <br>
            {{$fornecedores->firstItem()}} - Número do 1º registro da página
            <br>
            {{$fornecedores->lastItem()}} - Número do último registro da página
            <br>
            Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}} de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}}
        </div>
    </div>
</div>

@endsection
