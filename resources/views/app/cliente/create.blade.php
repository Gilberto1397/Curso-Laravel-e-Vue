@extends("app.layouts.basico")

@section("titulo", "cliente")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Cliente</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.cliente.index")}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{-- {{$msg ?? ""}} --}}
        <div style="width: 30%; margin: auto;">

            @component("app.cliente._componentes.form_create_edit")

            @endcomponent

        </div>
    </div>
</div>

@endsection
