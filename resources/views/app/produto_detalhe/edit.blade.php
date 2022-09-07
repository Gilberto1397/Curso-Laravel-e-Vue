
@extends("app.layouts.basico")

@section("titulo", "Produto")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar detalhes do Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.produto.index")}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <h4>Produto</h4>
        <div>Nome: {{$produtoDetalhe->produto->nome}}</div>
        <div>Descrição: {{$produtoDetalhe->produto->descricao}}</div>
        {{-- {{$msg ?? ""}} --}}
        <div style="width: 30%; margin: auto;">
            @component("app.produto_detalhe._componentes.form_create_edit", ["produto_detalhe" => $produtoDetalhe, "unidades" => $unidades])

            @endcomponent
        </div>
    </div>
</div>

@endsection
