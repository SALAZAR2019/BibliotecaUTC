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
            id_ejemplar:'',
            titulo:'',
            codigo:'',
            prestado:'',
            descripcion:'',
            id_auxiliar:'',
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
                    this.id_auxiliar=json.data.id_ejemplar;
                  

                    $('#edit_ejemplar').modal('show');
                });
            },
            //actualizar datos 
            updateEjemplar:function(){
                var us={
                    id_ejemplar:this.id_ejemplar,
                    codigo:this.codigo,
                    titulo:this.titulo
                 
                };
                this.$http.patch(urlE + '/' + this.id_auxiliar, us)
                .then(function(json){
                    this.Salir();
                    this.getEjemplares();
                   
                    
                 
                });
         },

           //eliminar user
           deleteEj:function(id){
            swal({
                title: "Se eliminará el usuario",
                text: "Está seguro de eliminar el usuario?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    this.$http.delete(urlE +'/'+id)
                    .then(function(json){
                        this.getEjemplares();
                        
                    });
                  swal("El usuario fue eliminado exitosamente", {
                    icon: "success",
                  });
                } else {
                  swal("El usuario no se ha eliminado");
                }
              });

            }, //fin eliminar

        } //fin de methods

    });
}

window.onload = init;