<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("clientes.clientes_index", ["clientes" => Cliente::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.clientes_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $cliente = new Cliente($request->input());
        if ($request->hasFile('foto')){
        $cliente['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        $cliente->saveOrFail();
        return redirect()->route("clientes.index")->with("mensaje", "Cliente agregado");




        //(new Cliente($request->input()))->saveOrFail();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }
    //vue ventas
     public function get_clientes_ticket()
    {
        //
        $posts = Cliente::select('id','nombre','telefono','acuenta','deuda','foto')->get();
        return response()->json($posts);
    }
    public function get_cliente_todos_los_datos($id)
    {
        //
        //dd($id);
        $posts = Cliente::find($id);
        return response()->json($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view("clientes.clientes_edit", ["cliente" => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {

        $cliente->fill($request->input());
        if ($request->hasFile('fotonueva')){
        $cliente['foto'] = $request->file('fotonueva')->store('uploads', 'public');
        }

        $cliente->saveOrFail();
        return redirect()->route("clientes.index")->with("mensaje", "Cliente actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route("clientes.index")->with("mensaje", "Cliente eliminado");
    }
}
