@extends("maestra")
@section("titulo", "Realizar venta")
@section("contenido")
    <div class="row" id="app">
        <div class="col-12">
            <h1>Nueva venta <i class="fa fa-cart-plus"></i></h1>
            @include("notificacion")
            <ventasindex></ventasindex>

          
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
@endsection
