<form action="{{ route('app.pedido-produto.store', ["pedido" => $pedido->id]) }}" method="post">
@csrf

<select name="produto_id">
    <option value="" >-- Selecione um Produto --</option>

    @foreach($produtos as $produto)
        <option value="{{ $produto->id }}" {{old('produto_id') == $produto->id ? 'selected' : '' }} >{{ $produto->nome }}</option>
    @endforeach
</select>
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input type="number" name="quantidade" value="{{old("quantidade") ? old("quantidade") : ""}}" placeholder="Quantidade" class="borda-preta" id="">
{{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

<button class="borda-preta" type="submit">Cadastrar</button> {{-- Pode mudar de acordo com a requisição --}}
</form>
