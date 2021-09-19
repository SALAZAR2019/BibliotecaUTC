function init()
{
    var	route= document.querySelector("[name=route]").value;
    var urlU = route + '/ApiUsuario';
    var urlT= route + '/apiTipos';

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

            id_auxi:'',
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
            }
        }, //fin de methods 

    });

}
window.onload = init;