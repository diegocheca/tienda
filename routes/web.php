<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route("home");
});
Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");
Route::get("/soporte", function(){
    return redirect("https://github.com/diegocheca/diegocheca");
})->name("soporte.index");

Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

Route::get('/home', 'HomeController@index')->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");


Route::middleware("auth")
    ->group(function () {
        Route::resource("clientes", "ClientesController");
        Route::resource("graficos", "GraficosController");
        Route::resource("usuarios", "UserController")->parameters(["usuarios" => "user"]);
        Route::resource("productos", "ProductosController");
        Route::get("/ventas/ticket", "VentasController@ticket")->name("ventas.ticket");
        Route::resource("ventas", "VentasController");
        Route::get("/vender", "VenderController@index")->name("vender.index");
        Route::post("/productoDeVenta", "VenderController@agregarProductoVenta")->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", "VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", "VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");
    });

Route::get('/exportar' , 'UserController@export' );
Route::get('/exportar_exel_productos' , 'ProductosController@exportarexcel' );

Route::get('/exportar_pdf_productos' , 'ProductosController@exportarproductosapdf' );

Route::get('/vender_nuevo' , 'VenderController@vender_vue' );




//clientes en tickets
Route::get('/clientes_get_ticket_todos', 'ClientesController@get_clientes_ticket');
Route::get('/clientes_get_todos_los_datos/{id}', 'ClientesController@get_cliente_todos_los_datos');



//graficos
//Route::get('/graficos' , 'ProductosController@graficos' );

