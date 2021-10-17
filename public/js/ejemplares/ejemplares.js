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
            ejemplares:[],
            id_ejemplar:'',
            codigo:'',
            ISBN:'',
            prestado:'',
            descripcion:'',
            // activo:'',
            id_auxE:'',
            editar=false
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


        }, //fin de methods

    });
}

window.onload = init;