<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request);

        $rota = $request->getRequestUri();

        $ip = $request->server->get("REMOTE_ADDR");

        $frase = ["log" => "O IP $ip entrou na rota $rota"];

        LogAcesso::create($frase);

        $resposta = $next($request);

        $resposta->setStatusCode("300", "Entrando no site");

        //dd($resposta);

        return $resposta;

        return response("Chegamos aqui via middleware");
    }
}
