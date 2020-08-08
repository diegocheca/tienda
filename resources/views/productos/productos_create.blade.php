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
@section("titulo", "Agregar producto")
@section("contenido")
	<div class="row">
		<div class="col-12">
			<h1>Agregar producto</h1>
			<form method="POST" action="{{route("productos.store")}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="label">Código de barras</label>
					<input required autocomplete="off" name="codigo_barras" class="form-control"
						   type="text" placeholder="Código de barras" value="2313113">
				</div>
				<div class="form-group">
					<label class="label">Descripción</label>
					<input required autocomplete="off" name="descripcion" class="form-control"
						   type="text" placeholder="Descripción" value="golosina nueva">
				</div>
				<div class="form-group">
					<label class="label">Precio de compra</label>
					<input required autocomplete="off" name="precio_compra" class="form-control"
						   type="decimal(9,2)" placeholder="Precio de compra" value="45">
				</div>
				<div class="form-group">
					<label class="label">Precio de venta</label>
					<input required autocomplete="off" name="precio_venta" class="form-control"
						   type="decimal(9,2)" placeholder="Precio de venta" value="59">
				</div>
				<div class="form-group">
					<label class="label">Existencia</label>
					<input required autocomplete="off" name="existencia" class="form-control"
						   type="decimal(9,2)" placeholder="Existencia" value="123">
				</div>
				<div class="form-group">
					<label class="label">Precio Dolar</label>
					<input required autocomplete="off" name="precio_en_dolar" class="form-control"
						   type="decimal(9,2)" placeholder="Precio en dolar" value="12.36">
				</div>
				<div class="form-group">
					<label class="label">stock minimo</label>
					<input required autocomplete="off" name="stock_minimo" class="form-control"
						   type="number" placeholder="Stock minimo" value="86">
				</div>
				<div class="form-group">
					<label class="label">Stock maximo</label>
					<input required autocomplete="off" name="stock_maximo" class="form-control"
						   type="number" placeholder="Stock maximo" value="521">
				</div>

				<div class="form-group">
					<label class="label" for="foto">Foto</label>
					<input required autocomplete="off" name="foto" id="foto" class="form-control"
						   type="file" placeholder="Busca..">
				</div>


				@include("notificacion")
				<button class="btn btn-success">Guardar</button>
				<a class="btn btn-primary" href="{{route("productos.index")}}">Volver al listado</a>
			</form>
		</div>
	</div>
@endsection
