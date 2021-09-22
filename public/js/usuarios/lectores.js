function init()
{
    var	route= document.querySelector("[name=route]").value;
    var urlU = route + '/ApiUsuario';

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
            id_usuario:'',
            nombres:'',
            apellido_p:'',
            apellido_m:'',
            direccion:'',
            correo:'',
            telefono:'',
            id_tipo:'',

            id_auxi:'',
            editar:false

        },
        created:function(){
            this.getUsuarios();
        },
        methods:{
            getUsuarios:function(){
                this.$http.get(urlU)
                .then(function(json){
                    this.lectores=json.data;
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
            addlector:function(){
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

        } //fin de methods 

    });

}
window.onload = init;