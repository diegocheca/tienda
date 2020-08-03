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
@section("titulo", "Editar cliente")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Editar cliente</h1>
            <form method="POST" action="{{route("clientes.update", [$cliente])}}"  enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$cliente->nombre}}" autocomplete="off" name="nombre" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Teléfono</label>
                    <input required value="{{$cliente->telefono}}" autocomplete="off" name="telefono"
                           class="form-control"
                           type="text" placeholder="Teléfono">
                </div>

                 <div class="form-group">


                  <label class="label">Acuenta</label>
                  <input  autocomplete="off" name="acuenta" class="form-control"
                       type="decimal(9,2)" placeholder="Precio en dolar" value="{{$cliente->acuenta}}">
                </div>
                <div class="form-group">
                  <label class="label">Dueda</label>
                  <input  autocomplete="off" name="deuda" class="form-control"
                       type="decimal(9,2)" placeholder="Valor deuda" value="{{$cliente->deuda}}">
                </div>
                <div class="form-group">
                  <label class="label" for="foto">Foto actual</label>
                  <img src="{{ asset ('storage') . '/'. $cliente->foto}}" alt="">
                                </td>
                </div>
                <div class="form-group">
                  <label class="label" for="fotonueva">Foto Nueva</label>
                  <input  autocomplete="off" name="fotonueva" id="fotonueva" class="form-control"
                       type="file" placeholder="Busca..">
                </div>


                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("clientes.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
