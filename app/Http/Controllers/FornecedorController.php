<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view("app.fornecedor.index");
    }

    public function listar(Request $r){
        $fornecedores = Fornecedor::where("nome", "like", "%".$r->input("nome")."%")
        ->where("site", "like", "%".$r->input("site")."%")
        ->where("uf", "like", "%".$r->input("uf")."%")
        ->where("email", "like", "%".$r->input("email")."%")
        ->paginate(2);

        $request = $r->all();

        return view("app.fornecedor.listar", compact("fornecedores", "request"));
    }

    public function adicionar(Request $r){
        $msg = "";

        if ($r->input("_token") != "" && $r->input("id") == "") {
            //Validação de dados para rotina
            $regras = [
                "nome" => "required|min:3|max:40",
                "site" => "required",
                "uf" => "required|min:2|max:2",
                "email" => "email",
            ];

            $feedback = [
                "required" => "O campo :attribute deve ser preenchido",
                "nome.min" => "O campo nome deve ter no mínimo 3 caracteres",
                "nome.max" => "O campo nome deve ter no máximo 40 caracteres",
                "uf.min" => "O campo UF deve ter no mínimo 2 caracteres",
                "uf.max" => "O campo UF deve ter no máximo 2 caracteres",
                "email.email" => "O campo e-mail não foi preencido corretamente"
            ];

            $r->validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($r->all());

            $msg = "Cadastro inserido com sucesso";
        }

        if ($r->input("_token") != "" && $r->input("id") != "") {
            $fornecedor = Fornecedor::find($r->input("id"));
            $update = $fornecedor->update($r->all());

            if ($update) {
                $msg = "Update feito com sucesso";
            } else {
                $msg = "Update falhou!!!";
            }

            return redirect()->route("app.fornecedor.editar", ["msg" => $msg, "id" => $r->input("id")]);
        }

        return view("app.fornecedor.adicionar", ["msg" => $msg]);
    }

    public function editar($id, $msg = ""){
        $fornecedor = Fornecedor::find($id);

        return view("app.fornecedor.adicionar", ["fornecedor" => $fornecedor, "msg" => $msg]);
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route("app.fornecedor");
    }
}
