function init()
{
    var	route= document.querySelector("[name=route]").value;
    var urlUser = route + '/apiUser';



new Vue
({

    http:{
        headers:{
            'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
    },

    el:'#bibliotecario',
    
    data:{
        users:[],
        nom:'hola',
        id_userlogin:'',
        nombres:'',
        apellidos:'',
        rol_puesto:'',
        usuario:'',
        password:'',
        activo:'',
        id_auxi:'',
        editar:false


     },
     created:function(){
        this.getUser();
     },
     methods:{
         getUser:function(){
             this.$http.get(urlUser)
             .then(function(json){
                 this.users=json.data;
             });
         },
         showModal:function(){
             $('#add_user').modal('show');
         },

         Salir:function(){
             this.editar=false;
             this.nombres='',
             this.apellidos='',
             this.rol_puesto='',
             this.usuario='',
             this.password='';
            //  this.activo='',
            $('#add_user').modal('hide');

         },
         addUser:function(){
             var us={
                nombres:this.nombres,
                apellidos:this.apellidos,
                rol_puesto:this.rol_puesto,
                usuario:this.usuario,
                password:this.password,
                //activo:this.activo,

                };
             this.$http.post(urlUser, us)
             .then(function(json){
                 this.Salir();
                 this.getUser();
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

         }, //fin de agregar user

         
         //mostrar modal de editar
         editUser:function(id){
            this.editar=true;
            this.$http.get(urlUser + '/' + id)
            .then(function(json){
                this.nombres=json.data.nombres;
                this.apellidos=json.data.apellidos;
                this.rol_puesto=json.data.rol_puesto;
                this.usuario=json.data.usuario;
                this.password=json.data.password;
                // this.activo=json.data.activo;
                this.id_auxi=json.data.id_userlogin;

                $('#add_user').modal('show');
            });
         },
         //actualizar datos de user
         updateUser:function(){
            var us={
                nombres:this.nombres,
                apellidos:this.apellidos,
                rol_puesto:this.rol_puesto,
                usuario:this.usuario,
                password:this.password,
                // activo:this.activo,
            };
            this.$http.patch(urlUser + '/' + this.id_auxi, us)
            .then(function(json){
                this.Salir();
                this.getUser();
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
         },



         //eliminar user
         deleteUser:function(id){
            swal({
                title: "Se eliminará el usuario",
                text: "Está seguro de eliminar el usuario?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    this.$http.delete(urlUser +'/'+id)
                    .then(function(json){
                        this.getUser();
                        
                    });
                  swal("El usuario fue eliminado exitosamente", {
                    icon: "success",
                  });
                } else {
                  swal("El usuario no se ha eliminado");
                }
              });

        },

     }

});

}
window.onload = init;
