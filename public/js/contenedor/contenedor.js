function init()
{
	var route = document.querySelector("[name=route]").value;
	var UrlContenedores=route + '/apiCon';

	new Vue
	({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

		el:'#contenedores',

		data:{
			contenedores:[],
			nom:'hola',
			id_contenedor:'',
			nom_contenedor:'',
			descripcion:'',
			id_auxi:'',
			editar:false
			
			
		},
		created:function(){
			this.getContenedores();
		},

		methods:{
			getContenedores:function(){
				this.$http.get(UrlContenedores)
				.then(function(json){
					this.contenedores=json.data;
				}).cacth(function(json){
					console.log(json);
				});
			},
			
			showModal:function(){
				$('#add_contenedores').modal('show');
			},

			Salir:function(){
				this.editar=false;

				this.nom_contenedor='';
				this.descripcion='';
				

				$('#add_contenedores').modal('hide');
			},

			agregarCon:function(){
				var cont={

					nom_contenedor:this.nom_contenedor,
					descripcion:this.descripcion,
					
				};
				this.$http.post(UrlContenedores, cont)
				.then(function(json){
					this.getContenedores();
					
				});
				this.Salir();
				
			},
			editarCon:function(id){
				this.editar=true;
				this.$http.get(UrlContenedores +'/'+ id)
				.then(function(json){
					this.nom_contenedor=json.data.nom_contenedor;
					this.descripcion=json.data.descripcion;
					this.id_auxi=json.data.id_contenedor;	
				
					$('#add_contenedores').modal('show');
				});
			},
			actualizarCon:function(){
				var co={
					nom_contenedor:this.nom_contenedor,
					descripcion:this.descripcion,
					
				};
				this.$http.patch(UrlContenedores + '/'+ this.id_auxi,co)
				.then(function(json){
					this.getContenedores();
					
				});
				this.Salir();
			},
			eliminarCon:function(id){
				var p=confirm('¿Esta seguro que desea eliminar?');
				if(p==true)
					this.$http.delete(UrlContenedores +'/'+id)
				.then(function(json){
					this.getContenedores();
					
				});
			},
			
		}

	});
}
window.onload = init;