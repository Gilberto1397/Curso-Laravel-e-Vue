<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);

        $request = $request->all();

        return view("app.pedido.index", compact("pedidos", "request"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();

        $pedido = false;

        return view("app.pedido.create", compact("clientes", "pedido"));
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
            "cliente_id" => "exists:clientes,id",
        ];

        $feedback = [
            "exists" => "O cliente informado não existe",
        ];

        $request->validate($regras, $feedback);

        $pedido = new Pedido();
        $pedido->cliente_id = $request->get("cliente_id");
        //$pedido->nome = $request->get("nome");

        $pedido->save();

        return redirect()->route("app.pedido.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view("app.pedido.show", compact("pedido"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();

        return view("app.pedido.create", compact("clientes", "pedido"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $regras = [
            "cliente_id" => "exists:clientes,id",
        ];

        $feedback = [
            "exists" => "O cliente informado não existe",
        ];

        $request->validate($regras, $feedback);

        $pedido->cliente_id = $request->get("cliente_id");

        $pedido->update();

        return redirect()->route("app.pedido.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route("app.pedido.index");
    }
}
