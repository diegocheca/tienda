@extends("maestra")
@section("titulo", "Usuarios")
@section("contenido")
	<div class="row">
		<div class="col-12">
			<div id="app" class="container">
				<h1>Graficos <i class="fa fa-chart-line"></i></h1>
				<grafica-component></grafica-component>
			</div>
		   
		</div>
	</div>
<script src="{{asset('js/app.js')}}"></script>
@endsection


