<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        $x = 3;
        $y = 2;
        $z = [
            "Teste 1",
            "Teste 1",
            "Teste 1",
        ];

        $motivo_contatos = MotivoContato::all();

        return view("site.principal", compact("motivo_contatos"));
    }

    public function PrincipalParam(int $n1 = 0, int $n2 = 0, Request $r){
        //return view("principal");
        //return "resultado:" . ($n1 + $n2);
        dd($r);
    }
}
