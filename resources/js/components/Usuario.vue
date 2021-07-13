<template>
    <div>
        <h1 class="text-center">Administración de usuarios</h1>
        <hr>


<section class="container"> 

<button @click="modificar=false; abrirModal();" type="button" class="btn btn-primary my-4">
  Nuevo
</button>

<!-- The Modal -->
<div class="modal" :class="{mostrar:modal}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{tituloModal}}</h4>
        <button @click="cerrarModal();" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="my-4">
          <label for="nombre">Nombre</label>
          <input v-model="usuario.nombre" type="text" class="form-control" id="nombre" placeholder="ej: Juan">
        </div>
        <div class="my-4">
          <label for="apellido">Apellido</label>
          <input v-model="usuario.apellido" type="text" class="form-control" id="apellido" placeholder="ej: Pérez">
        </div>
        <div class="my-4">
          <label for="telefono">Teléfono</label>
          <input v-model="usuario.telefono" type="text" class="form-control" id="telefono" placeholder="ej: 5550011">
        </div>
        <div class="my-4">
          <label for="correo">Correo</label>
          <input v-model="usuario.correo" type="text" class="form-control" id="correo" placeholder="ej: test@test.com">
        </div>
        <div class="my-4">
          <label for="rol_id">Rol</label>
            <select v-model="usuario.rol_id">
                <option v-for="option in options" v-bind:value="option.value">
                    {{ option.text }}
                </option>
            </select>
            <span>Seleccionado: {{ selected }}</span>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button @click="guardar();" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
      </div>

    </div>
  </div>
</div>
           
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Correo</th>
        <th scope="col">Rol</th>
        <th scope="col" colspan="2" class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="usr in usuarios" :key="usr.id">
        <th scope="row">{{usr.id}}</th>
        <td>{{usr.nombre}}</td>
        <td>{{usr.apellido}}</td>
        <td>{{usr.telefono}}</td>
        <td>{{usr.correo}}</td>
        <td>{{usr.nombreRol}}</td>
        <td>
            <button @click="modificar=true; abrirModal(usr);" class="btn btn-warning">Modificar</button>
        </td>
        <td v-if="usr.permiso === 'eliminar'">
            <button @click="eliminar(usr.id)" class="btn btn-danger">Eliminar</button>

        </td>
        </tr>
    </tbody>
    </table>
</section>

    </div>
</template>

<script>
export default {
    data() {
        return {
            usuario:{
                nombre:'',
                apellido:'',
                telefono:'',
                correo:'',
            },
            id:0,
            modificar:true,
            modal:0,
            tituloModal:"",
            usuarios:[],
            selected: '1',
            options: [
                { text: 'Admin', value: 1 },
                { text: 'Invitado', value: 2 },
            ]
        }
    },
    methods: {
        async listar(){
            const res=await axios.get('/usuarios');
            this.usuarios=res.data;
        },
        async eliminar(id){
            const res=await axios.delete('/usuarios/'+id);
            this.listar();
        },
        async guardar(){
            if(this.modificar){
                const res=await axios.put('/usuarios/'+this.id,this.usuario);
            }else{
                const res=await axios.post('/usuarios/',this.usuario);
            }
            this.cerrarModal();
            this.listar();
        },
        abrirModal(data={}){
            this.modal=1;
            if(this.modificar){
                this.id=data.id;
                this.tituloModal="Modificar usuario";
                this.usuario.nombre=data.nombre;
                this.usuario.apellido=data.apellido;
                this.usuario.telefono=data.telefono;
                this.usuario.correo=data.correo;
                this.usuario.rol_id=data.rol_id;
            }else{
                this.id=data=0;
                this.tituloModal="Crear usuario";
                this.usuario.nombre='';
                this.usuario.apellido='';
                this.usuario.telefono='';
                this.usuario.correo='';
                this.usuario.rol_id='';
            }
        },
        cerrarModal(){
            this.modal=0;
        },
    },

    created() {
        this.listar();
    },
}
</script>

<style>
.mostrar{
    display: list-item;
    opacity: 100%;
    background: rgba(15, 15, 15, 0.288);
}
</style>