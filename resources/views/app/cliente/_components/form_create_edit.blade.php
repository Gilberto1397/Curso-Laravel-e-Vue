@if (isset($cliente->id))
    <form action="{{ route('app.cliente.update', ['cliente' => $cliente->id]) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('app.cliente.store') }}" method="post">
@endif

@csrf

<input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ $cliente->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<button class="borda-preta" type="submit">{{isset($cliente->id) ? "Atualizar" : "Cadastrar"}}</button>
</form>
