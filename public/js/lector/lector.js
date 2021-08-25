function init()
{
	var route = document.querySelector("[name=route]").value;
	var UrlLe=route + '/apiLec';
	var UrlT=route + '/apiT';

	new Vue
	({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

		el:'#lectores',

		data:{
			lectores:[],
			tipos:[],
			nom:'hola',
			id_lector:'',
			nombre:'',
			apellido_p:'',
    		apellido_m:'',
    		correo:'',
    		grupo:'',
    		cuatrimestre:'',
    		activo:'',
    		id_tipo:'',
    		
			id_auxi:'',
			editar:false
			
			
		},
		created:function(){
			this.getLec();
			this.getTi();
		},

		methods:{
			getLec:function(){
				this.$http.get(UrlLe)
				.then(function(json){
					this.lectores=json.data;
				});
			},
			getTi:function(){
				this.$http.get(UrlT)
				.then(function(json){
					this.tipos=json.data;
				});
			},
			
			showModal:function(){
				$('#add_lectores').modal('show');
			},

			Salir:function(){
				this.editar=false;

				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.correo='';
				this.grupo='';
				this.cuatrimestre='';
				this.activo='';
				this.id_tipo='';
				
				

				$('#add_lectores').modal('hide');
			},

			agregarL:function(){
				var le={

					nombre:this.nombre,
					apellido_p:this.apellido_p,
					apellido_m:this.apellido_m,
					correo:this.correo,
					grupo:this.grupo,
					cuatrimestre:this.cuatrimestre,
					activo:this.activo,
					id_tipo:this.id_tipo,
					
					
				};
				this.$http.post(UrlLe, le)
				.then(function(json){
					this.getLec();
					
				});
				this.Salir();
				
			},
			editarL:function(id){
				this.editar=true;
				this.$http.get(UrlLe +'/'+ id)
				.then(function(json){
				this.nombre=json.data.nombre;
				this.apellido_p=json.data.apellido_p;
				this.apellido_m=json.data.apellido_m;
				this.correo=json.data.correo;
				this.grupo=json.data.grupo;
				this.cuatrimestre=json.data.cuatrimestre;
				this.activo=json.data.activo;
				this.id_tipo=json.data.id_tipo;
				
				this.id_auxi=json.data.id_lector;	
				
					$('#add_lectores').modal('show');
				});
			},
			actualizarL:function(){
				var b={
					nombre:this.nombre,
					apellido_p:this.apellido_p,
					apellido_m:this.apellido_m,
					correo:this.correo,
					grupo:this.grupo,
					cuatrimestre:this.cuatrimestre,
					activo:this.activo,
					id_tipo:this.id_tipo,
					
					
				};
				this.$http.patch(UrlLe + '/'+ this.id_auxi,b)
				.then(function(json){
					this.getLec();
					
				});
				this.Salir();
			},
			eliminarL:function(id){
				var p=confirm('¿Esta seguro que desea eliminar?');
				if(p==true)
					this.$http.delete(UrlLe +'/'+id)
				.then(function(json){
					this.getLec();
					
				});
			},
			
		}

	});
}
window.onload = init;