@if (isset($pedido->cliente->id))
    <form action="{{ route('app.pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('app.pedido.store') }}" method="post">
@endif

@csrf

<select name="cliente_id">
    <option>-- Selecione um Cliente --</option>

    @foreach($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ ($pedido->cliente->id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>
    @endforeach
</select>
{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

<button class="borda-preta" type="submit">{{isset($pedido->cliente->id) ? "Atualizar" : "Cadastrar"}}</button>
</form>
