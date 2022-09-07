@if (isset($produto_detalhe->id))
    <form action="{{ route('app.produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('app.produto-detalhe.store') }}" method="post">
@endif

@csrf
<input class="borda-preta" type="text" name="produto_id" placeholder="ID do produto" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input class="borda-preta" type="text" name="comprimento" placeholder="Comprimento"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input class="borda-preta" type="text" name="largura" placeholder="Largura" value="{{ $produto_detalhe->largura ?? old('largura') }}">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input class="borda-preta" type="text" name="altura" placeholder="Altura" value="{{ $produto_detalhe->altura ?? old('altura') }}">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<select name="unidade_id">
    <option> -- Selecione a unidade de medida--</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button class="borda-preta" type="submit">Cadastrar</button> {{-- Pode mudar de acordo com a requisição --}}
</form>
