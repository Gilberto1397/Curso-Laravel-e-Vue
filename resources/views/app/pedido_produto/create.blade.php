@extends("app.layouts.basico")

@section("titulo", "Pedido Produto")

@section('content')

<br>
<br>
<br>
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route("app.pedido.index")}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{-- {{$msg ?? ""}} --}}
        <h4>Detalhes do Pedido</h4>
        <p>ID do Pedido: {{$pedido->id}}</p>
        <p>Cliente do Pedido: {{$pedido->cliente_id}}</p>

        <div style="width: 30%; margin: auto;">
            <h4>Itens do pedido</h4>

            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pedido->produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @component("app.pedido_produto._components.form_create", ["pedido" => $pedido, "produtos" => $produtos])

            @endcomponent

        </div>
    </div>
</div>

@endsection
