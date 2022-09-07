<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\siteContato;

class ContatoController extends Controller
{
    public function contato(Request $r)
    {
        //print_r($r->all());

        /* echo "<br>";

        echo $r->input("nome"); */

        //$contato = new siteContato();

        /* $contato->nome = $r->input("nome");
        $contato->telefone = $r->input("telefone");
        $contato->email = $r->input("email");
        $contato->motivo_contato = $r->input("motivo_contato");
        $contato->mensagem = $r->input("mensagem"); */

        /* $contato->fill($r->all());

        print_r($contato->getAttributes());

        $contato->save(); */

        $motivo_contatos = MotivoContato::all();

        return view("site.contato", compact("motivo_contatos"));
    }

    public function salvar(Request $r){
       // dd($r->all());
        $r->validate([
            "nome" => "required|min:3|max:40",
            "telefone" => "required",
            "email" => "required|email|unique:site_contatos",
            "motivo_contatos_id" => "required",
            "mensagem" => "required|max:2000"
        ],
        [
            "required" => "O campo :attribute é obrigatório",
            "email" => "O campo :attribute precisa ser um e-mail válido"
        ]
    );

        siteContato::create($r->all());

        return redirect()->route("site.principal");
    }
}
