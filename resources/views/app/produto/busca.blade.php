@extends("app.layouts.basico")

@section("titulo", "Produto")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.produto.create")}}">Novo</a></li>
            <li><a href="{{route("app.produto.buscar")}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin: auto;">
            <form action="{{route("app.produto.listar")}}" method="post">
                @csrf
                <input class="borda-preta" type="text" name="nome" placeholder="Nome">
                <input class="borda-preta" type="text" name="descricao" placeholder="Descrição">
                <button class="borda-preta" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</div>

@endsection
