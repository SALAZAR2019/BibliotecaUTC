var url ='http://localhost/biblioteca/public/user';
new Vue({
    el:'#login',
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
    data:{
        demo:'hola mundo',
        matricula:'',
        nombre:'',
        apellido:'',
        contraseña:'',
        correo:'',
        celular:'',
        grado:'',
        grupo:'',
        errores:[],
        usuarios:[]
    },
	created:function(){
		this.getUsuarios();
	},
    methods:{
		getUsuarios:function(){
			this.$http.get(url)
			.then(function(json){
				this.usuarios=json.data;
			});
		},
        enviar:function(){
            //alert('hola mundo');
            this.errores=[];
            if(this.nombre==""){
                this.errores.push({mensaje:'el nombre esta vacio'});
            }
            if(this.contraseña==""){
                this.errores.push({mensaje:'el apellido esta vacio'});
            }
			var usuarios = {
				matricula:this.matricula,
				nombre:this.nombre,
				apellido:this.apellido,
                contraseña:this.contraseña,
                correo:this.correo,
                celular:this.celular,
                grado:this.grado,
                grupo:this.grupo

			}
			this.$http.post('http://localhost/biblioteca/public/user',usuarios)
			.then(function(json){
				alert('usuaio agregado con exito');
				this.getUsuarios();
				// console.log(json);
				this.editando=true;
			});
			
		},
    }

})