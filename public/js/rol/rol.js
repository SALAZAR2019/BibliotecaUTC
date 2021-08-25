function init()
{
	var route = document.querySelector("[name=route]").value;
	var UrlR=route + '/apiR';

	new Vue
	({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

		el:'#roles',

		data:{
			roles:[],
			nom:'hola',
			id_rol:'',
			denominacion:'',
			permisos:'',
    		activo:'',
			id_auxi:'',
			editar:false
			
			
		},
		created:function(){
			this.getRo();
		},

		methods:{
			getRo:function(){
				this.$http.get(UrlR)
				.then(function(json){
					this.roles=json.data;
				});
			},
			
			showModal:function(){
				$('#add_roles').modal('show');
			},

			Salir:function(){
				this.editar=false;

				this.denominacion='';
				this.permisos='';
				this.activo='';
				
				$('#add_roles').modal('hide');
			},

			agregarR:function(){
				var d={

					denominacion:this.denominacion,
					permisos:this.permisos,
					activo:this.activo,
					
				};
				this.$http.post(UrlR, d)
				.then(function(json){
					this.getRo();
					
				});
				this.Salir();
				
			},
			editarR:function(id){
				this.editar=true;
				this.$http.get(UrlR +'/'+ id)
				.then(function(json){
				this.denominacion=json.data.denominacion;
				this.permisos=json.data.permisos;
				this.activo=json.data.activo;
				this.id_auxi=json.data.id_rol;	
				
					$('#add_roles').modal('show');
				});
			},
			actualizarR:function(){
				var g={
					denominacion:this.denominacion,
					permisos:this.permisos,
					activo:this.activo,
					
				};
				this.$http.patch(UrlR + '/'+ this.id_auxi,g)
				.then(function(json){
					this.getRo();
					
				});
				this.Salir();
			},
			eliminarR:function(id){
				var p=confirm('¿Esta seguro que desea eliminar?');
				if(p==true)
					this.$http.delete(UrlR +'/'+id)
				.then(function(json){
					this.getRo();
					
				});
			},
			
		}

	});
}
window.onload = init;