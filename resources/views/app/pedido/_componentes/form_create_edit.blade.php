@if (isset($pedido->id))
    <form action="{{ route('app.pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('app.pedido.store') }}" method="post">
@endif

@csrf

<select name="cliente_id">
    <option>-- Selecione um Cliente --</option>

    @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('fornecedor_id')) == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>
    @endforeach
</select>
{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}


{{-- <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ $pedido->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }} --}}

<button class="borda-preta" type="submit">Cadastrar</button> {{-- Pode mudar de acordo com a requisição --}}
</form>
