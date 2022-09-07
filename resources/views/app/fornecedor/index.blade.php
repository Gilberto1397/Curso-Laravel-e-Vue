@extends("app.layouts.basico")

@section("titulo", "Fornecedor")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.fornecedor.adicionar")}}">Novo</a></li>
            <li><a href="{{route("app.fornecedor")}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin: auto;">
            <form action="{{route("app.fornecedor.listar")}}" method="post">
                @csrf
                <input class="borda-preta" type="text" name="nome" placeholder="Nome">
                <input class="borda-preta" type="text" name="site" placeholder="Site">
                <input class="borda-preta" type="text" name="uf" placeholder="UF">
                <input class="borda-preta" type="text" name="email" placeholder="E-mail">
                <button class="borda-preta" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</div>

@endsection
