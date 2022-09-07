@extends("app.layouts.basico")

@section("titulo", "cliente")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.pedido.index")}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{-- {{$msg ?? ""}} --}}
        <div style="width: 30%; margin: auto;">

            @component("app.pedido._componentes.form_create_edit", ["clientes" => $clientes])

            @endcomponent

        </div>
    </div>
</div>

@endsection
