@extends("app.layouts.basico")

@section("titulo", "Detalhes do Produto")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar detalhes do Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{-- {{$msg ?? ""}} --}}
        <div style="width: 30%; margin: auto;">

            @component("app.produto_detalhe._componentes.form_create_edit", ["unidades" => $unidades])

            @endcomponent

        </div>
    </div>
</div>

@endsection
