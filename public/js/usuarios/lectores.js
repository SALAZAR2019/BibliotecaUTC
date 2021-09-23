function init()
{
    var	route= document.querySelector("[name=route]").value;
    var urlU = route + '/ApiUsuario';
    var urlT=route + '/apiTipos';

    new Vue
    ({

        http:{
            headers:{
                'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
            }
        },

        el:'#lector',

        data:{
            lectores:[],
            tipos:[],
            id_usuario:'',
            nombres:'',
            apellido_p:'',
            apellido_m:'',
            direccion:'',
            correo:'',
            telefono:'',
            id_tipo:'',

            id_auxDNI:'',
            editar:false

        },
        created:function(){
            this.getUsuarios();
            this.getTipo();
        },
        methods:{
            getUsuarios:function(){
                this.$http.get(urlU)
                .then(function(json){
                    this.lectores=json.data;
                });
            },
            getTipo:function(){
                this.$http.get(urlT)
                .then(function(json){
                    this.tipos=json.data;
                });
            },
            showModal:function(){
                $('#add_lector').modal('show');
            },

            Salir:function(){
                this.editar=false;
                this.id_usuario='',
                this.nombres='',
                this.apellido_p='',
                this.apellido_m='',
                this.direccion='',
                this.correo='',
                this.telefono='',
                this.id_tipo='',
               $('#add_lector').modal('hide');
            },
            addLector:function(){
                var l={
                    id_usuario:this.id_usuario,
                    nombres:this.nombres,
                    apellido_p:this.apellido_p,
                    apellido_m:this.apellido_m,
                    direccion:this.direccion,
                    correo:this.correo,
                    telefono:this.telefono,
                    id_tipo:this.id_tipo,
                };
                this.$http.post(urlU, l)
                .then(function(json){
                    this.Salir();
                    this.getUsuarios();
                    Swal.fire({
                        type: 'success',
                        title: 'El usuario se agregó con éxito',
                        showConfirmButton: false,
                        timer: 1900
                    });
                },function(reason){
                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Campos vacios',
                        footer: 'Llene todos los campos para continuar'
                      });
                });
            }, //fin del agregar lector

            //mostrar modal de editar
            editLector:function(id){
            this.editar=true;
            this.$http.get(urlU + '/' + id)
            .then(function(json){
                this.id_usuario=json.data.id_usuario;
                this.nombres=json.data.nombres;
                this.apellido_p=json.data.apellido_p;
                this.apellido_m=json.data.apellido_m;
                this.direccion=json.data.direccion;
                this.correo=json.data.correo;
                this.telefono=json.data.telefono;
                this.id_tipo=json.data.id_tipo;
                this.id_auxDNI=json.data.id_usuario;

                $('#add_lector').modal('show');
            });
         }, //fin de editar

            //actualizar datos del usuario
            updateLector:function(){
                var lec={
                    id_usuario:this.id_usuario,
                    nombres:this.nombres,
                    apellido_p:this.apellido_p,
                    apellido_m:this.apellido_m,
                    direccion:this.direccion,
                    correo:this.correo,
                    telefono:this.telefono,
                    id_tipo:this.id_tipo,
                };
                this.$http.patch(urlU + '/' + this.id_auxDNI, lec)
                .then(function(json){
                    this.Salir();
                    this.getUsuarios();
                    Swal.fire({
                        type: 'success',
                        title: 'El usuario se actualizó con éxido',
                        showConfirmButton: false,
                        timer: 1900
                    });
                 
                }, function(reason){
                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Campos vacíos',
                        footer: 'Llene todos los campos para continuar'
                    });
                });
            }, //fin del actualizar

            //eliminar user
         deleteLector:function(id){
            Swal.fire({
                title: "Se eliminará el usuario",
                text: "Está seguro de eliminar el usuario?",
                icon: "warning",
                showCancelButton:true,
                confirmButtonText:"si,eliminar",
                cancelButtonText:"Cancelar",
                dangerMode: true,
              })
              .then(resultado => {
                if (resultado.value) {
                    this.$http.delete(urlU +'/'+id)
                    .then(function(json){
                        this.getUsuarios();
                        
                    });
                  Swal.fire("El usuario fue eliminado exitosamente", {
                    icon: "success",
                  });
                } else {
                  Swal.fire("El usuario no se ha eliminado");
                }
              });

            }, //fin eliminar

        } //fin de methods 

    });

}
window.onload = init;