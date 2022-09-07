<form action="{{route("site.contato.save")}}" method="post">
    @csrf
    <input name="nome" value="{{old("nome")}}" type="text" placeholder="Nome" class="borda-preta">
    <div style="background-color: blue; color: white;">{{$errors->has("nome") ? $errors->first("nome") : ""}}</div>
    <br>
    <input name="telefone" value="{{old("telefone")}}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{old("email")}}" type="text" placeholder="E-mail" class="borda-preta">
    <div style="background-color: blue; color: white;">{{$errors->has("email") ? $errors->first("email") : ""}}</div>
    <br>
    <select name="motivo_contatos_id" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato )
        <option value="{{$motivo_contato->id}}" {{old("motivo_contato") == $motivo_contato->id ? "selected" : ""}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach

        {{-- <option value="1" {{old("motivo_contato") == 1 ? "selected" : ""}}>Dúvida</option>
        <option value="2" {{old("motivo_contato") == 2 ? "selected" : ""}}>Elogio</option>
        <option value="3" {{old("motivo_contato") == 3 ? "selected" : ""}}>Reclamação</option> --}}
    </select>
    <br>
    <textarea name="mensagem" class="borda-preta">{{old("mensagem") != "" ? old("mensagem") : "Preencha aqui a sua mensagem"}}</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

{{-- @if ($errors->any())
<div style="position: absolute; top: 0; left: 0; width: 100%; background-color: red;">
    @foreach ($errors->all() as $erro)
    {{$erro}}
    <br>
    @endforeach
</div>
@endif --}}
