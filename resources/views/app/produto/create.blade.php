@extends("app.layouts.basico")

@section("titulo", "Produto")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produto</p>
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

            @component("app.produto._componentes.form_create_edit", ["unidades" => $unidades, "fornecedores" => $fornecedores])

            @endcomponent

        </div>
    </div>
</div>

@endsection
