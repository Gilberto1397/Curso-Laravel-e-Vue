<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $r){
        $erro = "";

        if ($r->get("erro") == 1) {
            $erro = "Usuário e/ou senha não existe";
        }

        if ($r->get("erro") == 2) {
            $erro = "Você precisa estar logado!";
        }

        return view("site.login", ["titulo" => "Login", "erro" => $erro]);
    }

    public function autenticar(Request $r){

        //regras de validação
        $regras = [
            "usuario" => "email",
            "senha" => "required"
        ];

        //mensagens de feedback
        $feedback = [
            "usuario.email" => "O campo usuário deve ser um email válido",
            "senha.required" => "O campo senha é obrigatório"
        ];

        $r->validate($regras, $feedback);

        //Recuperar os parâmetros do form
        $email = $r->get("usuario");
        $password = $r->get("senha");

        echo "Usuário: $email | Senha: $password";
        echo "</br>";

        //Iniciar o model User
        $user = new User();

        $usuario = $user->where("email", $email)
                       ->where("password", $password)
                       ->get()
                       ->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION["nome"] = $usuario->name;
            $_SESSION["email"] = $usuario->email;

            return redirect()->route("app.home");
        }else{
            return redirect()->route("site.login", ["erro" => 1]);
        }

        //return "Chegamos aqui";
    }

    public function sair(){
        session_destroy();

        return redirect()->route("site.principal");
    }
}
