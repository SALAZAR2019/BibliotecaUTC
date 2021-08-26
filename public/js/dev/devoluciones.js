	var route = document.querySelector("[name=route]").value;
	var UrlPre=route + '/apiPrestamo';
	var Urldev=route + '/apidevolucion';
	function init()
	{
	new Vue({
		http:{
			headers:{
				'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
			}
		},

		el:'#prestamos',

		data:{
			prestamos:[],
			devoluciones:[],
			buscar:'',
			nom:'hola',
			folio:'',
			id_ejemplar:'',
			id_prestamo:'',
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
			editar:true
			
			
		},
		created:function(){
			this.getPre();
			this.getDev();
		},

		methods:{
			getPre:function(){
				this.$http.get(UrlPre)
				.then(function(json){
					this.prestamos=json.data;
                    
				});
			},
			getDev:function(){
				this.$http.get(Urldev)
				.then(function(json){
					this.devoluciones=json.data;
                   
				});
			},
			
			showModal:function(){
				$('#add_devolucion').modal('show');
			},

			Salir:function(){
				this.editar=false;

				this.id_ejemplar='';
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
				

				$('#add_devolucion').modal('hide');

				//location.reload();
			},

			dev:function(id){
				//this.editar=true;
				this.$http.get(UrlPre +'/'+ id)
				.then(function(json){
				this.folio=json.data.folio;
				this.id_ejemplar=json.data.id_ejemplar;
				this.id_prestamo=json.data.id_prestamo;
				this.id_auxi=json.data.id_tipo;	
				
					$('#add_devolucion').modal('show');
				});
			},
			devolver:function(){
				var dev={

					id_ejemplar:this.id_ejemplar,
					folio:this.folio,
					id_prestamo:this.id_prestamo
					//activo:this.activo,
					
				};
				this.$http.post(Urldev, dev)
				.then(function(json){
					this.getDev();
					//location.reload();
				});
				this.Salir();
			},

			
	},
	computed:{
		filtroPrestamos:function(){
			return this.prestamos.filter((pre)=>{
				return pre.folio.match(this.buscar.trim())||
				pre.ejemplar.libros.titulo.toLowerCase().match(this.buscar.trim().toLowerCase());
				
			});
		}
	}

});
}
window.onload=init;
