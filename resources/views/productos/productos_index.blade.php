{{--

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
--}}
@extends("maestra")
@section("titulo", "Productos")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Productos <i class="fa fa-box"></i></h1>
            <a href="{{route("productos.create")}}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <div class="table-responsive">
                <form method="GET" action="{{route('productos.index')}}">
                    <div class="text-right">
                        <input type="text" name="buscador" id="buscador" placeholder="buscar en todos lados"  >
                        <span for="registrosporpagina">numero de registros </span> 
                        <select nmae="registrosporpagina">
                            <option value="3" > 3</option>
                            <option value="5" selected> 5</option>
                            <option value="10"> 10</option>
                            <option value="50"> 50</option>
                            <option value="100"> 100</option>
                         </select>
                        <button class="btn btn-success mb-1" type="submit" >Filtrar</button>
                    </div>
                    
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Código de barras
                                filtrar 
                            <input type="text" name="buscador_solo_codigobarras" id="buscador_solo_codigobarras" placeholder="buscar..."   >
                            <button class="btn btn-success mb-1" type="submit" >Filtrar</button>
                        </th>
                            <th>Descripción</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Utilidad</th>
                            <th>Existencia</th>
                            <th>imagen</th>

                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{$producto->codigo_barras}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->precio_compra}}</td>
                                <td>{{$producto->precio_venta}}</td>
                                <td>{{$producto->precio_venta - $producto->precio_compra}}</td>
                                <td>{{$producto->existencia}}</td>
                                <td>
                                    <?php
                                    $mostrarAhora = substr($producto->foto1, 0, 5);
                                   // echo $mostrarAhora;
                                    $mostrarAhora = '';
                                    if(substr($producto->foto1, 0, 5)  != "https")
                                        $mostrarAhora = asset(('storage') . '/'. $producto->foto1);
                                    else
                                        $mostrarAhora = $producto->foto1;
                                    ?>


                                    <img src="{{$mostrarAhora}}" alt="" width="200">
                                    </td>
                                <td>
                                    <a class="btn btn-warning" href="{{route("productos.edit",[$producto])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route("productos.destroy", [$producto])}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$productos->links()}}
                    
            </div>
        </div>
    </div>
@endsection
