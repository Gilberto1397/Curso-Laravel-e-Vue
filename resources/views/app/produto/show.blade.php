@extends("app.layouts.basico")

@section("titulo", "Produto")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Visualizar Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.produto.index")}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{-- {{$msg ?? ""}} --}}
        <div style="width: 30%; margin: auto;">
            <table border="1" width="100%">
                <tr>
                    <td>ID:</td>
                    <td>{{$produto->id}}</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{$produto->nome}}</td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>{{$produto->descricao}}</td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td>{{$produto->peso}}Kg</td>
                </tr>
                <tr>
                    <td>Unidade de medida:</td>
                    <td>{{$produto->unidade_id}}</td>
                </tr>
                <tr>
                    <td>Fornecedor:</td>
                    <td>{{$produto->fornecedor->nome}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
