<?php

namespace App\Http\Controllers;

use App\Graficos;
use Illuminate\Http\Request;

class GraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("graficos.graficos_view");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function show(Graficos $graficos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function edit(Graficos $graficos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graficos $graficos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graficos $graficos)
    {
        //
    }
}
