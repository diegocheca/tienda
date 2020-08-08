<template>
	<div>
			<buscador-cliente  v-on:cambio_cliente_emit="refrescar_cliente_id($event)"></buscador-cliente>
			<p>cliente: {{cliente_elegido}} cantdad_de_productos : {{cantdad_de_productos_global}}</p>
			<!--<button class="btn btn-success" v-on:click="agregar_producto">Nuevo Producto</button>-->
			<!--<button class="btn btn-danger" v-on:click="eliminar_todos_productos">Limpar Orden</button>-->

		<h2>Total: ${{total}}</h2>
								
	</div>
</template>

<script>

Vue.component('buscador-cliente', require('./BuscadorClienteComponent.vue'));

export default {
	// components: {
	//   LineChart
	// },
	data(){
		return {
			cliente_elegido: '',
			cantdad_de_productos_global: 10,
			total: 0
		}
	},
	// mounted () {
	//   this.fillData()
	// },
	methods: {
		refrescar_cliente_id(id){
              console.log("recibi el id del cliente cambiado como:"+id);
              this.cliente_elegido = id;

            },


		// fillData ()
		// {
		//   this.datacollection = {
		//     labels: ['Lunes','Martes','Miercoles','Jueves','Viernes', 'Sabado' , 'Domingo', 'Domingo', 'Domingo'],
		//     datasets: [
		//       {
		//         label: 'Ventas',
		//         backgroundColor: '#FF0066',
		//         data: [ 30, 40, 50, 20, 50, 40, 80, 100, 25]
		//       },
		//     ]
		//   }
		// }
	}
}
</script>

