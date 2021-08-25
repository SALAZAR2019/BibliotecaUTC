function init()
{
	var route = document.querySelector("[name=route]").value;
	var UrlT=route + '/apiT';

	new Vue
	({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

		el:'#tipos',

		data:{
			tipos:[],
			nom:'hola',
			id_tipo:'',
			tipo:'',
    		activo:'',
			id_auxi:'',
			editar:false
			
			
		},
		created:function(){
			this.getTi();
		},

		methods:{
			getTi:function(){
				this.$http.get(UrlT)
				.then(function(json){
					this.tipos=json.data;
				});
			},
			
			showModal:function(){
				$('#add_tipos').modal('show');
			},

			Salir:function(){
				this.editar=false;

				this.tipo='';
				this.activo='';
				
				$('#add_tipos').modal('hide');
			},

			agregarT:function(){
				var f={

					tipo:this.tipo,
					activo:this.activo,
					
				};
				this.$http.post(UrlT, f)
				.then(function(json){
					this.getTi();
					this.Salir();
				});
				
				
			},
			editarT:function(id){
				this.editar=true;
				this.$http.get(UrlT +'/'+ id)
				.then(function(json){
				this.tipo=json.data.tipo;
				this.activo=json.data.activo;
				this.id_auxi=json.data.id_tipo;	
				
					$('#add_tipos').modal('show');
				});
			},
			actualizarT:function(){
				var u={
					tipo:this.tipo,
					activo:this.activo,
					
				};
				this.$http.patch(UrlT + '/'+ this.id_auxi,u)
				.then(function(json){
					this.getTi();
					
				});
				this.Salir();
			},
			eliminarT:function(id){
				var p=confirm('¿Esta seguro que desea eliminar?');
				if(p==true)
					this.$http.delete(UrlT +'/'+id)
				.then(function(json){
					this.getTi();
					
				});
			},
			
		}

	});
}
window.onload = init;