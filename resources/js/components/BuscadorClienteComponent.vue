<template>
   <div class="row">
    <crear-cliente :id_cliente_padre="785" v-on:secreounnuevocliente="cambiocliente_desde_crear($event)" ></crear-cliente>
    <div class="col-6">
    
        <v-select  
          transition="" 
          :options="ListaDeClientes" 
          label="apellido"
          @input="cambiocliente" 
          class="form-control" 
          v-model="cliente"
          item-value="id"
          >
            <template slot="option" slot-scope="option">
               <img v-bind:src="'http://localhost:8000/storage/uploads/' + option.avatar" width="40px" height="40px" /> 
                {{ option.apellido +" , " + option.nombre}}
            </template>
        </v-select>
    </div>
    <div class="col-2">
      <img v-if="cliente!= '' " v-bind:src="'http://localhost:8000/storage/uploads/' + cliente.avatar" width="180px" height="180px" /> 
    </div>
    <div class="col-3" v-if="cliente!= '' ">
      <span>AyN:{{cliente.apellido}},{{cliente.nombre}}</span>
      <br>
      <span>Tel:{{cliente.telefono1}}</span>
      <br>
      <span>Dir:{{cliente.direccion1}},{{cliente.ciudad1}},{{cliente.numerodireccion1}},{{cliente.orientacion1}}</span>
      <br>
      <span>Afavor:{{cliente.afavor}}</span>
      <br>
      <span><font color="red"> Deuda:{{cliente.deuda}}</font></span>
      <br>
      <span ><a v-show="mas_info" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" v-on:click="buscar_todos_datos"> Mas Info</a> </span>
      <span ><a v-show="!mas_info" class="btn btn-danger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" v-on:click="mas_info = !mas_info" > Menos Inf</a> </span>

    </div>
     <div class="col-3" v-else>
      <h1>asd</h1>
     </div>
    <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Link with href
    </a> -->
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        todos_los_datos
        <span>AyN:{{todos_los_datos.apellido}},{{todos_los_datos.nombre}}</span>
        <br>
        <span>Tel:{{todos_los_datos.telefono1}}</span>
        <br>
        <span>Dir:{{todos_los_datos.direccion1}},{{todos_los_datos.ciudad1}},{{todos_los_datos.numerodireccion1}},{{todos_los_datos.orientacion1}}</span>
        <br>
        <span>Afavor:{{todos_los_datos.afavor}}</span>
        <br>
        <span><font color="red"> Deuda:{{todos_los_datos.deuda}}</font></span>
        <br>
        <span>id:{{todos_los_datos.id}}</span>
        <br>
        <span>Dir2:{{todos_los_datos.direccion2}},{{todos_los_datos.ciudad2}},{{todos_los_datos.numerodireccion2}},{{todos_los_datos.orientacion2}}</span>
        <br>
        <span>Dir3:{{todos_los_datos.direccion3}},{{todos_los_datos.ciudad3}},{{todos_los_datos.numerodireccion3}},{{todos_los_datos.orientacion3}}</span>
        <br>
        <span>Cant Comp:{{todos_los_datos.cantidad_compras}}</span>
        <br>
        <span>Cant Comp:{{todos_los_datos.avatar}}</span>
        <br>
        <span>telefono2:{{todos_los_datos.telefono2}}</span>
        <br>
        <span>telefono3:{{todos_los_datos.telefono3}}</span>
        <br>
        <span>telefono4:{{todos_los_datos.telefono4}}</span>
        <br>
        <span>dni:{{todos_los_datos.dni}}</span>
        <br>
        <span>cuit:{{todos_los_datos.cuit}}</span>
        <br>
        <span>observacion:{{todos_los_datos.observacion}}</span>
        <br>
        <span>quien_creo:{{todos_los_datos.quien_creo}}</span>
        <br>
        <span>quien_modfico:{{todos_los_datos.quien_modfico}}</span>
        <br>
        <span>ultima_compra:{{todos_los_datos.ultima_compra}}</span>
        <br>
        <span>promos:{{todos_los_datos.promos}}</span>
        <br>
        <span>facebook:{{todos_los_datos.facebook}}</span>
        <br>
        <span>instagram:{{todos_los_datos.instagram}}</span>

        


        

      </div>
    </div>
</div>
</template>

<script>
 import vSelect from 'vue-select'

Vue.component('crear-cliente', require('./CrearClienteComponent.vue'));
  Vue.component('v-select', vSelect)
    export default {
        
name: "buscador-cliente",
    data() {
      return {
        cliente: '',
        mas_info: true,
        todos_los_datos:[],
          ListaDeClientes: [],
          mens:"HOLA desde vue",
        };
        },
         created() {
            this.fetchClientesList();
        },
         methods: {
            fetchClientesList() {
                axios.get('clientes_get_ticket_todos').then((res) => {
                    this.ListaDeClientes = res.data;
                });
                console.log(this.ListaDeClientes);
            },
            // cambiocliente() {
            //   alert("cambio el cliente");
            // },
            cambiocliente: function(id){
              //alert("cambio el cliente");
              this.$emit('cambio_cliente_emit',id.id)
            },
            buscar_todos_datos() {
                axios.get('clientes_get_todos_los_datos/'+this.cliente.id).then((res) => {
                    this.todos_los_datos = res.data;
                });
                this.mas_info= false;
            },
            cambiocliente_desde_crear: function(cliente_nuevo_desde_hijo){
              //alert("cambio el cliente");
              //pushear el nuevo cliente a la lista de clientes existentes
              //ListaDeClientes
              //lista de elementos que tiene lista de clientes
              //('id','apellido','nombre','telefono1','direccion1','ciudad1','numerodireccion1','orientacion1','dni','cantidad_compras','avatar','afavor','deuda')->get();
              //cliente_nuevo_desde_hijo
              var cliente_nuevo_reducido = {
                'id' : cliente_nuevo_desde_hijo.id ,
                //'apellido' : cliente_nuevo_desde_hijo.apellido ,
                'apellido' : '',
                'nombre' : cliente_nuevo_desde_hijo.nombre ,
                'telefono1' : 123,//cliente_nuevo_desde_hijo.telefono1 ,
                'direccion1' : 'direccion de casa',//cliente_nuevo_desde_hijo.direccion1 ,
                'ciudad1' : 'sj',// cliente_nuevo_desde_hijo.ciudad1 ,
                'numerodireccion1' : 456, //cliente_nuevo_desde_hijo.numerodireccion1 ,
                'orientacion1' : 'sur', //cliente_nuevo_desde_hijo.orientacion1 ,
                'dni' : 123, //cliente_nuevo_desde_hijo.dni ,
                'cantidad_compras' : 45, //cliente_nuevo_desde_hijo.cantidad_compras ,
                'avatar' : cliente_nuevo_desde_hijo.foto ,//cliente_nuevo_desde_hijo.avatar ,
                'afavor' : cliente_nuevo_desde_hijo.afavor ,
                'deuda' : cliente_nuevo_desde_hijo.deuda ,
              }
              this.ListaDeClientes.push(cliente_nuevo_reducido);

              //seleccionar el cliente agregado
              this.cliente = cliente_nuevo_reducido ;

              //llamo a la funcion del padre
              this.$emit('cambio_cliente_emit',cliente_nuevo_desde_hijo.id);

            },


        },
        
    }
</script>

