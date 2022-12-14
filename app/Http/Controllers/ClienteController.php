<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = $request->all();

        $clientes = Cliente::paginate(10);

        return view("app.cliente.index", compact("clientes", "request"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = false;

        return view("app.cliente.create", compact("cliente"));
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
        ];

        $feedback = [
            "required" => "O campo :attribute deve ser preenchido",
            "min" => "O campo :attribute deve ter no min 3 caracteres",
            "max" => "O campo :attribute deve ter no max 40 caracteres",
        ];

        $request->validate($regras, $feedback);

        Cliente::create($request->all());

        return redirect()->route("app.cliente.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  Cliente  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente) // Mesmo nome da parâmetro que o da rota
    {
        return view("app.cliente.show", compact("cliente"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view("app.cliente.create", compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $regras = [
            "nome" => "required|min:3|max:40",
        ];

        $feedback = [
            "required" => "O campo :attribute deve ser preenchido",
            "min" => "O campo :attribute deve ter no min 3 caracteres",
            "max" => "O campo :attribute deve ter no max 40 caracteres",
        ];

        $request->validate($regras, $feedback);

        $cliente->update($request->all());

        return redirect()->route("app.cliente.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CLiente $cliente)
    {
        $cliente->delete();

        return redirect()->route("app.cliente.index");
    }
}
