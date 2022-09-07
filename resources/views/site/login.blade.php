@extends('site.layouts.basico')

@section("titulo", $titulo)

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin: auto;">
                <form action="{{route("site.login")}}" method="POST">
                    @csrf

                    <input class="borda-preta" type="text" name="usuario" placeholder="Usuário" value="{{old("usuario")}}">
                    {{$errors->first("usuario") ?? ""}}

                    <input class="borda-preta" type="password" name="senha" placeholder="Senha" value="{{old("senha")}}">
                    {{$errors->has("senha") ? $errors->first("senha") : ""}}

                    <button type="submit">Entrar</button>

                </form>

                @if (isset($erro) && !empty($erro))
                    <div>{{$erro}}</div>
                @endif

            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
