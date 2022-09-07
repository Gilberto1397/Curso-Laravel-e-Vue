<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        $request = $request->all();

        return view("app.produto.index", compact("produtos", "request"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //TODO Recriar form de create
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view("app.produto.create", compact("unidades", "fornecedores"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            "nome" => "required|min:3|max:40",
            "descricao" => "required|min:3|max:2000",
            "peso" => "required|integer",
            "unidade_id" => "required|exists:unidades,id", //verificando se o valor recebido existe na tabela unidades, coluna id
        ];

        $feedback = [
            "required" => "O campo :attribute deve ser preenchido",
            "nome.min" => "O campo :attribute deve ter no mínimo 3 caracteres",
            "nome.max" => "O campo :attribute deve ter no máximo 40 caracteres",
            "descricao.min" => "O campo :attribute deve ter no mínimo 3 caracteres",
            "descricao.max" => "O campo :attribute deve ter no máximo 2000 caracteres",
            "peso.ineger" => "O campo :attribute deve ser um número inteiro",
            "unidade_id.exists" => "A unidade de medida informada não existe"
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route("app.produto.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto) // Aqui a variável $product é automaticamente resultado de um find com o id recebido como parâmetro
    {
        return view("app.produto.show", compact("produto"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view("app.produto.edit", compact("produto", "unidades", "fornecedores"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //dd($request->all());
        $regras = [
            "nome" => "required|min:3|max:40",
            "descricao" => "required|min:3|max:2000",
            "peso" => "required|integer",
            "unidade_id" => "required|exists:unidades,id", //verificando se o valor recebido existe na tabela unidades, coluna id
            "fornecedor_id" => "required|exists:fornecedores,id"
        ];

        $feedback = [
            "required" => "O campo :attribute deve ser preenchido",
            "nome.min" => "O campo :attribute deve ter no mínimo 3 caracteres",
            "nome.max" => "O campo :attribute deve ter no máximo 40 caracteres",
            "descricao.min" => "O campo :attribute deve ter no mínimo 3 caracteres",
            "descricao.max" => "O campo :attribute deve ter no máximo 2000 caracteres",
            "peso.integer" => "O campo :attribute deve ser um número inteiro",
            "fornecedor_id.exists" => "O fornecedor informado não existe"
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all());

        return redirect()->route("app.produto.show", compact("produto"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //dd($produto);
        $produto->delete();
        return redirect()->route("app.produto.index");
    }
}
