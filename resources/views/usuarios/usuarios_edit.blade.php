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
@section("titulo", "Editar usuario")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Editar usuario</h1>
            <form method="POST" action="{{route("usuarios.update", [$usuario])}}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$usuario->name}}" autocomplete="off" name="name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Correo electrónico</label>
                    <input required value="{{$usuario->email}}" autocomplete="off" name="email" class="form-control"
                           type="email" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                    <label class="label">Contraseña</label>
                    <input  value="{{$usuario->password}}" autocomplete="off" name="password"
                           class="form-control"
                           type="password" placeholder="Contraseña">
                </div>
              <div class="form-group">
                    <label class="label">ultima conexion</label>
                    <input  value="{{$usuario->ultima_conexion}}" autocomplete="off" name="ultima_conexion" class="form-control"
                           type="datetime-local">
                </div>


                <div class="form-group">
                <label class="label" for="foto">Foto actual</label>
                <img src="{{ asset ('storage') . '/'. $usuario->foto}}">
              </div>
              <div class="form-group">
                <label class="label" for="fotonueva">Foto nueva</label>
                <input  autocomplete="off" name="fotonueva" id="fotonueva" class="form-control"
                     type="file" placeholder="Busca..">
              </div>


                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("usuarios.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
