	var route = document.querySelector("[name=route]").value;
	var UrlPre=route + '/apiPrestamo';
	var Urldev=route + '/apidevolucion';
	var UrlSend=route+'/envios';
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
    		id_usuario:'',
			titulo:'',
			id_libro:'',
			fecha_prestamo:'',
			fecha_actual:moment().format('YYYY-MM-DD') //almacena fecha.
			
		},
		created:function(){
			this.getPre();
			this.getDev();
			this.envios();
			
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


				this.id_ejemplar='';
				this.id_libro='';
				this.id_prestamo='';
				this.fecha_prestamo='';
				

				$('#add_devolucion').modal('hide');
				
			},

			dev:function(id){
				this.$http.get(UrlPre +'/'+ id)
				.then(function(json){

				this.folio=json.data.folio;
				this.id_ejemplar=json.data.id_ejemplar;
				this.id_prestamo=json.data.id_prestamo;
				this.id_usuario=json.data.id_usuario;
				this.id_libro=json.data.id_libro;
				this.titulo=json.data.ejemplar.libros.titulo;
				this.fecha_prestamo=json.data.fecha_prestamo;
				this.fecha_actual=this.fecha_actual;
				
					$('#add_devolucion').modal('show');
				});
			}
			,
			envio:function(){
				this.$http.post(UrlSend)
				.then(function(){
					swal({
						text: "Se ha enviado aviso ",
						icon: "success",

					  })
					this.getPre();
				});
			},
			envios(){
			   setInterval(()=>{
				this.envio();
			   },43200000);
		   },
			devolver:function(){
				var dev={

					id_ejemplar:this.id_ejemplar,
					folio:this.folio,
					id_prestamo:this.id_prestamo,
					fecha_prestamo:this.fecha_prestamo,
					fecha_actual:this.fecha_actual
					
				};
				this.$http.post(Urldev, dev)
				.then(function(json){
					swal({
						text: "Se ha registrado la devolucion del libro",
						icon: "success",

					  })
					this.getPre();
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
