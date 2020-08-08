<?php
/*

  ____          _____               _ _           _       
 |  _ \        |  __ \             (_) |         | |      
 | |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___ 
 |  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
 | |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
 |____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
         __/ |                               __/ |        
        |___/                               |___/         
    
    Blog:       https://parzibyte.me/blog
    Ayuda:      https://parzibyte.me/blog/contrataciones-ayuda/
    Contacto:   https://parzibyte.me/blog/contacto/
    
    Copyright (c) 2020 Luis Cabrera Benito
    Licenciado bajo la licencia MIT
    
    El texto de arriba debe ser incluido en cualquier redistribucion
*/ ?>
<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;

use Barryvdh\DomPDF\Facade as PDF;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $abuscar = $request->except(['_token', '_method']);
        //var_dump($abuscar);

        //cantidad de registros
        if( ( array_key_exists('registrosporpagina', $abuscar)) && ($abuscar['buscador_solo_codigobarras'] != NULL) )
            $numero_de_registros_po_pagina =  $abuscar['registrosporpagina'];
        else
            $numero_de_registros_po_pagina = 5;
        //buscador de todo
        if(array_key_exists('buscador', $abuscar) && ($abuscar['buscador'] != NULL)  )
        {
            $abuscar = $abuscar['buscador'];
            //var_dump($abuscar);die();
            $productos = Producto::orderBy('id', 'DESC')
            ->descripcion($abuscar)
            ->codigo_barras($abuscar)
            ->precio_venta($abuscar)
            ->paginate($numero_de_registros_po_pagina);
        }
        else
            //buscar solo codigo de barras
            if(array_key_exists('buscador_solo_codigobarras', $abuscar) &&  ($abuscar['buscador_solo_codigobarras'] != NULL)  )
            {
                $abuscar = $abuscar['buscador_solo_codigobarras'];
               // var_dump($abuscar);die();
                $productos = Producto::orderBy('id', 'DESC')
                ->Where('codigo_barras', 'LIKE', "%$abuscar%")
                ->paginate($numero_de_registros_po_pagina);
            }
            // por defecto
            else 
                $productos = Producto::paginate($numero_de_registros_po_pagina);
        return view("productos.productos_index", compact("productos") );
        //$someUsers = User::where('votes', '>', 100)->paginate(15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function exportarexcel(){
        /* Desechamos cualquier contenido generado previamente */
        ob_end_clean();
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }
     public function exportarproductosapdf(){
        /* Desechamos cualquier contenido generado previamente */
        $productos = Producto::limit(17)->get();
        //var_dump($productos);die();
        ob_end_clean();
        $pdf = PDF::loadView('productos.productospdfview', compact('productos'));
        //return PDF::download(new ProductosExport, 'productos.xlsx');
            return $pdf->download('productosenpdf.pdf');
    }

    public function create()
    {
        return view("productos.productos_create");
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //  var_dump($request->hasFile('foto'), $request->file('foto'));die();
        $producto = new Producto($request->input());
       if ($request->hasFile('foto')){
        $producto['foto1'] = $request->file('foto')->store('uploads', 'public');


       /* $archivoFoto=$request->file('foto');
        $nombreFoto=time().$archivoFoto->getClientOriginalName(); 
        $archivoFoto->move(public_path().'/images/', $nombreFoto);
        // esta es la línea que faltaba. Llamo a la foto del modelo y le asigno la foto recogida por el formulario de actualizar.          
        $producto['foto1']=$nombreFoto; */



        }


        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("mensaje", "Producto guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view("productos.productos_edit", ["producto" => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->fill($request->input());
        if ($request->hasFile('fotonueva')){
        $producto['foto1'] = $request->file('fotonueva')->store('uploads', 'public');
        }




        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("mensaje", "Producto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route("productos.index")->with("mensaje", "Producto eliminado");
    }
}
