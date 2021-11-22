function init()
{
    var	route= document.querySelector("[name=route]").value;
    var urlE= route + '/apiejem';

    new Vue
    ({
        http:{
            headers:{
                'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
            }
        },
        el:'#ejemplar',

        data:{
            nom:'hola',
            ejemplares:[],
            titulo:'',
            codigo:'',
            prestado:'',
            descripcion:'',
            editar:false
            
        },

        created:function(){
            this.getEjemplares();
        },

        methods:{
            getEjemplares:function(){
                this.$http.get(urlE)
                .then(function(json){
                    this.ejemplares=json.data;
                });
            },
            showModal:function(){
                $('#edit_ejemplar').modal('show');
            },
   
            Salir:function(){
                this.editar=false;
                this.codigo='',
               $('#edit_ejemplar').modal('hide');
            },
              //mostrar modal de editar
            editEjemplar:function(id){
                this.editar=true;
                this.$http.get(urlE + '/' + id)
                .then(function(json){
                    this.codigo=json.data.codigo;
                    this.titulo=json.data.titulo;
                   

                    $('#edit_ejemplar').modal('show');
                });
            },
            //actualizar datos 
            updateEjemplar:function(){
                var us={
                    codigo:this.codigo
                 
                };
                this.$http.patch(urlE + '/' + this.titulo, us)
                .then(function(json){
                    this.Salir();
                    this.getEjemplares();
                    Swal.fire({
                        type: 'success',
                        title: 'Actualizado',
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

        } //fin de methods

    });
}

window.onload = init;