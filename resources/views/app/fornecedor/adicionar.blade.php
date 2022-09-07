@extends("app.layouts.basico")

@section("titulo", "Fornecedor")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.fornecedor.adicionar")}}">Novo</a></li>
            <li><a href="{{route("app.fornecedor")}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{$msg ?? ""}}
        <div style="width: 30%; margin: auto;">
            <form action="{{route("app.fornecedor.adicionar")}}" method="post">
                <input type="hidden" value="{{$fornecedor->id ?? ""}}" name="id">
                @csrf
                <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{$fornecedor->nome ?? old("nome")}}">
                {{$errors->has("nome") ? $errors->first("nome") : ""}}
                <input class="borda-preta" type="text" name="site" placeholder="Site" value="{{$fornecedor->site ?? old("site")}}">
                {{$errors->has("site") ? $errors->first("site") : ""}}
                <input class="borda-preta" type="text" name="uf" placeholder="UF" value="{{$fornecedor->uf ?? old("uf")}}">
                {{$errors->has("uf") ? $errors->first("uf") : ""}}
                <input class="borda-preta" type="text" name="email" placeholder="E-mail" value="{{$fornecedor->email ?? old("email")}}">
                {{$errors->has("email") ? $errors->first("email") : ""}}
                <button class="borda-preta" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

@endsection
