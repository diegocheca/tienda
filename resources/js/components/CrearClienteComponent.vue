<style >
	.slide-fade-enter-active {
	  transition: all .3s ease;
	}
	.slide-fade-leave-active {
	  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
	}
	.slide-fade-enter, .slide-fade-leave-to
	/* .slide-fade-leave-active below version 2.1.8 */ {
	  transform: translateX(10px);
	  opacity: 0;
	}
</style>
<template>
	<div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
			Nuevo Usuario
		</button>
		<div  class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Crear Usuario Nuevo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="form-row" style="background-color:#EBF5FB;">
								<div class="col-md-4 mb-3">
									<label for="validationCustom01">Nombre</label>
									<input type="text" class="form-control" id="validationCustom01" placeholder="First name" v-model="cliente_nuevo.nombre" value="Mark" required>
									<div class="valid-feedback">
										Looks good!
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<label for="validationCustom02">Apellido </label>
									<input type="text" class="form-control" id="validationCustom02" placeholder="Last name" v-model="cliente_nuevo.apellido" required>
									<div class="valid-feedback">
										Looks good!
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<label for="validationCustom02">DNI </label>
									<input type="text" class="form-control" id="validationCustom02" placeholder="Last name" v-model="cliente_nuevo.dni" value="Otto" required>
									<div class="valid-feedback">
										Looks good!
									</div>
								</div>
							</div>
							<hr>
							<div class="form-row" style="background-color:#F2F3F4;">
								<div class="col-md-5 mb-5">
									<label for="validationCustom01">direccion1</label>
									<input type="text" class="form-control" id="validationCustom01" placeholder="First name"  v-model="cliente_nuevo.direccion1" value="Mark" required>
									<div class="valid-feedback">
										Looks good!
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<label for="validationCustom02">ciudad1 </label>
									<input type="text" class="form-control" id="validationCustom02" placeholder="Last name"  v-model="cliente_nuevo.ciudad1" value="Otto" required>
									<div class="valid-feedback">
										Looks good!
									</div>
								</div>
								<div class="col-md-1 mb-3">
									<label for="validationCustomUsername">num</label>
									<div class="input-group">
										
										<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"  v-model="cliente_nuevo.numerodireccion1" aria-describedby="inputGroupPrepend" required>
										<div class="invalid-feedback">
											Please choose a username.
										</div>
									</div>
								</div>
								<div class="col-md-1 mb-3">
									<label for="validationCustomUsername">orient</label>
									<div class="input-group">
										
										<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"  v-model="cliente_nuevo.orientacion1" aria-describedby="inputGroupPrepend" required>
										<div class="invalid-feedback">
											Please choose a username.
										</div>
									</div>
								</div>
								<div class="col-md-1 mb-3">
									<button class="btn btn-success" v-on:click="mostrar_direccion2=true" >+</button>
								</div>
							</div>
							<!--  DIRECCION 2 -->
							<hr v-show="mostrar_direccion2">
							<transition name="slide-fade">
								<div class="form-row" v-show="mostrar_direccion2" style="background-color:#E5E7E9;">
									<div class="col-md-5 mb-5">
										<label for="validationCustom01">direccion2</label>
										<input type="text" class="form-control" id="validationCustom01" placeholder="First name"  v-model="cliente_nuevo.direccion2" value="Mark" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom02">ciudad2 </label>
										<input type="text" class="form-control" id="validationCustom02" placeholder="Last name"  v-model="cliente_nuevo.ciudad2" value="Otto" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationCustomUsername">num</label>
										<div class="input-group">
											
											<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" v-model="cliente_nuevo.numerodireccion2"  aria-describedby="inputGroupPrepend" required>
											<div class="invalid-feedback">
												Please choose a username.
											</div>
										</div>
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationCustomUsername">orient</label>
										<div class="input-group">
											
											<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" v-model="cliente_nuevo.orientacion2"  aria-describedby="inputGroupPrepend" required>
											<div class="invalid-feedback">
												Please choose a username.
											</div>
										</div>
									</div>
									<div class="col-md-1 mb-3">
										<button class="btn btn-success" v-on:click="mostrar_direccion3=true">+</button>
										<button class="btn btn-danger" v-on:click="mostrar_direccion2=false">-</button>
									</div>
								</div>
							</transition>
							<!--  DIRECCION 3 -->
							<hr v-show="mostrar_direccion3">
							<transition name="slide-fade">
								<div class="form-row" v-show="mostrar_direccion3" style="background-color:#D7DBDD;">
									<div class="col-md-5 mb-5">
										<label for="validationCustom01">direccion3</label>
										<input type="text" class="form-control" id="validationCustom01" placeholder="First name"  v-model="cliente_nuevo.direccion3" value="Mark" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom02">ciudad3 </label>
										<input type="text" class="form-control" id="validationCustom02" placeholder="Last name" v-model="cliente_nuevo.ciudad3"  value="Otto" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationCustomUsername">num</label>
										<div class="input-group">
											
											<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"  v-model="cliente_nuevo.numerodireccion3" aria-describedby="inputGroupPrepend" required>
											<div class="invalid-feedback">
												Please choose a username.
											</div>
										</div>
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationCustomUsername">orient</label>
										<div class="input-group">
											
											<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"  v-model="cliente_nuevo.orientacion3" aria-describedby="inputGroupPrepend" required>
											<div class="invalid-feedback">
												Please choose a username.
											</div>
										</div>
									</div>
									<div class="col-md-1 mb-3">
										<button class="btn btn-danger" v-on:click="mostrar_direccion3=false">-</button>
									</div>
								</div>
							</transition>
							<hr>
							<div class="form-row" style="background-color:#F4F6F6;">
								<div class="col-md-9 mb-9">
									<label for="validationCustom01">Telefono 1:</label>
									<input type="text" class="form-control" id="validationCustom01" placeholder="First name"  v-model="cliente_nuevo.telefono1" value="Mark" required>
									<div class="valid-feedback">
										Looks good!
									</div>
								</div>
								<div class="col-md-2 mb-2">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Whatapps?</label>
								</div>

								<div class="col-md-1 mb-1">
									<button class="btn btn-success" v-on:click="mostrar_telefono2=true">+</button>
								</div>
							</div>
								<hr v-show="mostrar_telefono2">
							<transition name="slide-fade">
								<div class="form-row" v-show="mostrar_telefono2" style="background-color:#EAEDED;">
									<div class="col-md-9 mb-9">
										<label for="validationCustom01">Telefono 2:</label>
										<input type="text" class="form-control" id="validationCustom01" placeholder="First name"  v-model="cliente_nuevo.telefono2" value="Mark" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-2 mb-2">
										<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">Whatapps?</label>
									</div>

									<div class="col-md-1 mb-1">
										<button class="btn btn-success" v-on:click="mostrar_telefono3=true">+</button>
										<button class="btn btn-danger" v-on:click="mostrar_telefono2=false">-</button>
									</div>
								</div>
							</transition>
							<hr v-show="mostrar_telefono3">
							<transition name="slide-fade">
								<div class="form-row" v-show="mostrar_telefono3" style="background-color:#D5DBDB;">
									<div class="col-md-9 mb-9">
										<label for="validationCustom01">Telefono 3:</label>
										<input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" v-model="cliente_nuevo.telefono3" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-2 mb-2">
										<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">Whatapps?</label>
									</div>

									<div class="col-md-1 mb-1">
										<button class="btn btn-danger" v-on:click="mostrar_telefono3=false">-</button>
									</div>
								</div>
							</transition>
							<hr>
							<div class="form-row" style="background-color:#FEF9E7;">
								<div class="col-md-9 mb-9">
									<label for="validationCustomUsername">email</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend">@</span>
										</div>
										<input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"  v-model="cliente_nuevo.telefono4" aria-describedby="inputGroupPrepend" required>
										<div class="invalid-feedback">
											Please choose a username.
										</div>
									</div>
								</div>
								<div class="col-md-2 mb-2">
									<transition name="slide-fade">
										<button class="btn btn-success" v-on:click="mostrar_mas_datos=true" v-show="!mostrar_mas_datos">Mas Datos</button>
									</transition>
									<transition name="slide-fade">
										<button class="btn btn-danger" v-on:click="mostrar_mas_datos=false" v-show="mostrar_mas_datos">Menos Datos</button>
									</transition>
								</div>
							</div><!--ROW-->
							<hr v-show="mostrar_mas_datos">
							<transition name="slide-fade">
								<div class="form-row" style="background-color:#E8F6F3;" v-show="mostrar_mas_datos">
									<div class="col-md-4 mb-3">
										<label for="validationCustom01">afavor</label>
										<input type="text" class="form-control" id="validationCustom01" placeholder="First name"   v-model="cliente_nuevo.afavor"  value="Mark" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom02">deuda </label>
										<input type="text" class="form-control" id="validationCustom02" placeholder="Last name"  v-model="cliente_nuevo.deuda"  value="Otto" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="validationCustom01">cantidad_compras</label>
										<input type="text" class="form-control" id="validationCustom01" placeholder="First name"   v-model="cliente_nuevo.cantidad_compras" value="Mark" required>
										<div class="valid-feedback">
											Looks good!
										</div>
									</div>
								</div>
							</transition>
							<hr v-show="mostrar_mas_datos">
							<!-- <div class="row">
								<div class="col-md-3">
									<div class="form-group">
									<label for="recipient-name" class="col-form-label">cuit:</label>
									<input type="text" class="form-control" id="recipient-name">
								</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
									<label for="recipient-name" class="col-form-label">quien_creo:</label>
									<input type="text" class="form-control" id="recipient-name">
								</div>
								</div>


								<div class="col-md-3">
									<div class="form-group">
									<label for="recipient-name" class="col-form-label">quien_modfico:</label>
									<input type="text" class="form-control" id="recipient-name">
								</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
									<label for="recipient-name" class="col-form-label">ultima_compra:</label>
									<input type="text" class="form-control" id="recipient-name">
								</div>
								</div>
							</div><!--ROW  -->
							<transition name="slide-fade">
								<div class="form-row" style="background-color:#F5EEF8;" v-show="mostrar_mas_datos">
									<div class="col-md-9">
										 <div class="form-group">
											<label for="message-text" class="col-form-label">observacion:</label>
											<textarea class="form-control" id="message-text"  v-model="cliente_nuevo.observacion"  ></textarea>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="recipient-name" class="col-form-label">promos:</label>
											<input type="text" class="form-control" id="recipient-name"  v-model="cliente_nuevo.promos"  >
										</div>
									</div>
								</div><!--ROW-->
							</transition>
							<!-- <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">facebook:</label>
										<input type="text" class="form-control" id="recipient-name">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">instagram:</label>
										<input type="text" class="form-control" id="recipient-name">
									</div>
								</div>
							</div><!--ROW-> -->
							{{cliente_nuevo}}
						</div>
						<div class="modal-footer">
							el id:{{id_cliente_padre}}
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-primary" v-on:click="enviar_datos">Crear</button>
							<button @click="mostrar_mensaje('algo123')">toastr</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
  import toastr from 'toastr'

		export default {
		name: "crear-cliente",
		props: {
			id_cliente_padre: Number
		},
		data() {
			return {
				mostrar_direccion2: false,
				mostrar_direccion3: false,
				mostrar_telefono2: false,
				mostrar_telefono3: false,
				mostrar_mas_datos: false,
				cliente_recien_creado: [],
				cliente_nuevo: {
					'apellido':'',
					'nombre': '',
					'telefono1': '',
					'direccion1': '',
					'ciudad1': '',
					'numerodireccion1': '',
					'orientacion1': '',
					'afavor': '',
					'deuda': '',
					'id': '',
					'direccion2': '',
					'ciudad2': '',
					'numerodireccion2': '',
					'orientacion2': '',
					'direccion3': '',
					'ciudad3': '',
					'numerodireccion3': '',
					'orientacion3': '',
					'cantidad_compras': 0,
					'telefono2': '',
					'telefono3': '',
					'telefono4': '',
					'dni': '',
					'cuit': '',
					'observacion': '',
					'quien_creo': '',
					'quien_modfico': '',
					'ultima_compra': '',
					'promos': '',
					'facebook': '',
					'instagram': '',
				},

				};
		},
		methods :{
			enviar_datos(){
				var ticketts_api= 
				{
					'apellido':this.cliente_nuevo["apellido"],
					'nombre': this.cliente_nuevo["nombre"],
					'telefono1':  this.cliente_nuevo["telefono1"],
					'direccion1':  this.cliente_nuevo["direccion1"],
					'ciudad1':  this.cliente_nuevo["ciudad1"],
					'numerodireccion1':  this.cliente_nuevo["numerodireccion1"],
					'orientacion1':  this.cliente_nuevo["orientacion1"],
					'afavor':  this.cliente_nuevo["afavor"],
					'deuda': this.cliente_nuevo["deuda"],
					'direccion2': this.cliente_nuevo["direccion2"],
					'ciudad2': this.cliente_nuevo["ciudad2"],
					'numerodireccion2': this.cliente_nuevo["numerodireccion2"],
					'orientacion2': this.cliente_nuevo["orientacion2"],
					'direccion3': this.cliente_nuevo["direccion3"],
					'ciudad3': this.cliente_nuevo["ciudad3"],
					'numerodireccion3': this.cliente_nuevo["numerodireccion3"],
					'orientacion3': this.cliente_nuevo["orientacion3"],
					'cantidad_compras': 0,
					'telefono2': this.cliente_nuevo["telefono2"],
					'telefono3': this.cliente_nuevo["telefono3"],
					'telefono4': this.cliente_nuevo["telefono4"],
					'dni': this.cliente_nuevo["dni"],
					'cuit':  this.cliente_nuevo["cuit"],
					'observacion':  this.cliente_nuevo["observacion"],
					'promos': this.cliente_nuevo["promos"],
				};
				axios.post('api/cliente', ticketts_api)
					.then((res) => {
						console.log(res);
						this.cliente_recien_creado = res.data;
						toastr.info("El cliente se guardo correctamente. Desea agregarlo a este ticket?<br /><br /><button type=\"button\" class=\"btn clear\">Si</button>", "Cliente Guardado");
						this.enviar_datos_a_padre_cliente();
					})
					.catch((err) => console.error(err));
			},
			mostrar_mensaje(){
				/*toastr.options = {
					'closeButton': true,
					'debug': false,
					'newestOnTop': false,
					'progressBar': false,
					'positionClass': 'toast-top-right',
					'preventDuplicates': false,
					'showDuration': '1000',
					'hideDuration': '1000',
					'timeOut': '5000',
					'extendedTimeOut': '1000',
					'showEasing': 'swing',
					'hideEasing': 'linear',
					'showMethod': 'fadeIn',
					'hideMethod': 'fadeOut',
				};

				*/
				toastr.info("El cliente se guardo correctamente. Desea agregarlo a este ticket?<br /><br /><button type=\"button\" class=\"btn clear\">Si</button>", "Cliente Guardado");
				 /*toastr["info"]("El cliente se guardo correctamente. Desea agregarlo a este ticket?<br /><br /><button type=\"button\" class=\"btn clear\">Si</button>", "Cliente Guardado", {
		            "closeButton": true,
		            "debug": true,
		            "newestOnTop": true,
		            "progressBar": true,
		            "positionClass": "toast-top-right",
		            "preventDuplicates": false,
		            "onclick": null,
		            "showDuration": 30000,
		            "hideDuration": 1000,
		            "timeOut": 20000,
		            "extendedTimeOut": 1001,
		            "showEasing": "swing",
		            "hideEasing": "linear",
		            "showMethod": "fadeIn",
		            "hideMethod": "fadeOut"
		          });*/
			},
			enviar_datos_a_padre_cliente(){
				//this.cliente_recien_creado
				this.$emit('secreounnuevocliente',this.cliente_recien_creado);

			}

		}
	}
</script>


