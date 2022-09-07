<form action="{{ route('app.pedido-produto.store', ["pedido" => $pedido->id]) }}" method="post">
@csrf

<select name="produto_id">
    <option>-- Selecione um Produto --</option>

    @foreach($produtos as $produto)
        <option value="{{ $produto->id }}" {{old('produto_id') == $produto->id ? 'selected' : '' }} >{{ $produto->nome }}</option>
    @endforeach
</select>
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}


{{-- <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ $pedido->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }} --}}

<button class="borda-preta" type="submit">Cadastrar</button> {{-- Pode mudar de acordo com a requisição --}}
</form>
