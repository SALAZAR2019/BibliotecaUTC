function init()
{
    var	route= document.querySelector("[name=route]").value;
    var urlT= route + '/apiTipos';

    new Vue
    ({
        http:{
            headers:{
                'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
            }
        },

        el:'#tipo_us',

        data:{
            tipos:[],
            id_tipo:'',
            nombre_tipo:'',
            descripcion:'',

            id_auxiT:'',
            editar:false
            
        },
        created:function(){
            this.getTipo();
        },

        methods:{
            getTipo:function(){
                this.$http.get(urlT)
                .then(function(json){
                    this.tipos=json.data;
                });
            },
            showModal:function(){
                $('#add_Tipo').modal('show');
            },
   
            Salir:function(){
                this.editar=false;
                this.nombre_tipo='',
                this.descripcion='',
           
               $('#add_Tipo').modal('hide');
   
            },
            addTipo:function(){
                var t={
                   nombre_tipo:this.nombre_tipo,
                   descripcion:this.descripcion,
                   };

                    this.$http.post(urlT, t)
                    .then(function(json){
                        this.Salir();
                        this.getTipo();
                        Swal.fire({
                            type: 'success',
                            title: 'El tipo de lector se agregó con éxito',
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
            }, //fin de agregar tipo

            //mostrar modal de editar
            editTipo:function(id){
                this.editar=true;
                this.$http.get(urlT + '/' + id)
                .then(function(json){
                    this.nombre_tipo=json.data.nombre_tipo;
                    this.descripcion=json.data.descripcion;
                    this.id_auxiT=json.data.id_tipo;

                    $('#add_Tipo').modal('show');
                });
            }, //fin del editar

            updateTipo:function(){
                var ti={
                    nombre_tipo:this.nombre_tipo,
                    descripcion:this.descripcion,
                };
                this.$http.patch(urlT + '/' + this.id_auxiT, ti)
                .then(function(json){
                    this.Salir();
                    this.getTipo();
                    Swal.fire({
                        type: 'success',
                        title: 'El tipo de usuario se actualizó con éxido',
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
            }, //fin actualizar

            deleteTipo:function(id){
                swal({
                    title: "Se eliminará el tipo de usuario",
                    text: "Está seguro de eliminarlo?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        this.$http.delete(urlT +'/'+id)
                        .then(function(json){
                            this.getTipo();
                            
                        });
                      swal("El tipo de usuario fue eliminado exitosamente", {
                        icon: "success",
                      });
                    } else {
                      swal("El tipo de usuario no se ha eliminado");
                    }
                  });
    
             }, //fin eliminar

        } //fin de methods

    });

}
window.onload = init;