function init()
{
	var route = document.querySelector("[name=route]").value;
	var UrlU=route + '/apiU';
	var UrlR=route + '/apiR';

	new Vue
	({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

		el:'#usuarios',

		data:{
			usuarios:[],
			roles:[],
			nom:'hola',
			id_usuario:'',
			nombres:'',
			apellido_p:'',
    		apellido_m:'',
    		curp:'',
    		direccion:'',
    		correo:'',
    		telefono:'',
    		usser:'',
    		password:'',
    		activo:'',
    		id_rol:'',
			id_auxi:'',
			editar:false
			
			
		},
		created:function(){
			this.getUs();
			this.getRo();
		},

		methods:{
			getUs:function(){
				this.$http.get(UrlU)
				.then(function(json){
					this.usuarios=json.data;
				});
			},

			getRo:function(){
				this.$http.get(UrlR)
				.then(function(json){
					this.roles=json.data;
				});
			},
			
			showModal:function(){
				$('#add_usuarios').modal('show');
			},

			Salir:function(){
				this.editar=false;

				this.nombres='';
				this.apellido_p='';
				this.apellido_m='';
				this.curp='';
				this.direccion='';
				this.correo='';
				this.telefono='';
				this.usser='';
				this.password='';
				this.activo='';
				this.id_rol='';
				

				$('#add_usuarios').modal('hide');
			},

			agregarU:function(){
				var a={

					nombres:this.nombres,
					apellido_p:this.apellido_p,
					apellido_m:this.apellido_m,
					curp:this.curp,
					direccion:this.direccion,
					correo:this.correo,
					telefono:this.telefono,
					usser:this.usser,
					password:this.password,
					activo:this.activo,
					id_rol:this.id_rol,
					
				};
				this.$http.post(UrlU, a)
				.then(function(json){
					this.getUs();
					
				});
				this.Salir();
				
			},
			editarU:function(id){
				this.editar=true;
				this.$http.get(UrlU +'/'+ id)
				.then(function(json){
				this.nombres=json.data.nombres;
				this.apellido_p=json.apellido_p;
				this.apellido_m=json.data.apellido_m;
				this.curp=json.data.curp;
				this.direccion=json.data.direccion;
				this.correo=json.data.correo;
				this.telefono=json.data.telefono;
				this.usser=json.data.usser;
				this.password=json.data.password;
				this.activo=json.data.activo;
				this.id_rol=json.data.id_rol;
				this.id_auxi=json.data.id_usuario;	
				
					$('#add_usuarios').modal('show');
				});
			},
			actualizarU:function(){
				var b={
					nombres:this.nombres,
					apellido_p:this.apellido_p,
					apellido_m:this.apellido_m,
					curp:this.curp,
					direccion:this.direccion,
					correo:this.correo,
					telefono:this.telefono,
					usser:this.usser,
					password:this.password,
					activo:this.activo,
					id_rol:this.id_rol,
					
				};
				this.$http.patch(UrlU + '/'+ this.id_auxi,b)
				.then(function(json){
					this.getUs();
					
				});
				this.Salir();
			},
			eliminarU:function(id){
				var p=confirm('¿Esta seguro que desea eliminar?');
				if(p==true)
					this.$http.delete(UrlU +'/'+id)
				.then(function(json){
					this.getUs();
					
				});
			},
			
		}

	});
}
window.onload = init;