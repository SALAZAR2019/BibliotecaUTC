
var	route= document.querySelector("[name=route]").value;
var urlLib = route + '/apiejem';
var urlPres= route +'/apiPrestamo';

var btnEnviar = document.getElementById("btnEnviar");
var caja1 = document.getElementById("id_usuario");
var caja2 = document.getElementById("libro");

btnEnviar.disabled = true;
caja2.disabled = true;

function init()
{
new Vue({

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#prestamo',

	created:function(){
		this.foliarVenta();
	},

	data:{
		nombre:'QUE ONDA',
		libros:[],
		prestamos:[],
		codigo:'',
		id_libro:'',
		id_ejemplar:'',
		ISBN:'',
		id_usuario:'',
		titulo:'',
		activo:'',
		pago:0,
		tot:0,
		
		folio:'',
		fecha_prestamo:moment().format('YYYY-MM-DD') //almacena fecha.
	},

	// area de metodos
	methods:{
		getLibros:function(){
			this.$http.get(urlLib + '/' + this.codigo)
			.then(function(json){

				if(json.data===""){
					swal({
						text: "El libro no se encuentra disponible ",
						icon: "warning",
						buttons: ['OK'],
					  })
					document.getElementById("btnEnviar").disabled=true;
					this.codigo='';
				}
				var prestamo={'id_libro':json.data.id_libro,
							'id_ejemplar':json.data.id_ejemplar,
							'titulo':json.data.libros.titulo,
							'ISBN':json.data.libros.ISBN,
							'codigo':json.data.codigo,
							'prestado':json.data.prestado,
							}

				if (prestamo.id_ejemplar){
					this.prestamos.push(prestamo);
					
				}
				
				this.codigo='';
				this.$refs.buscar.focus();

			})
		},

		// fin de get Libros

		eliminarLibro:function(id){
			this.prestamos.splice(id,1);
			
		},
		eliminarLibros:function(id){
			this.prestamos.splice(id);
			this.id_usuario="";
		}, 
		
		foliarVenta:function(){
			this.folio='VTA-' + moment().format('YYMMDDhmmss');
		},
		
		prestamo:function(){
			
			var detalles2 = [];
			var newdetalles =[];

			var id_usuario = document.getElementById("id_usuario").value;

			for (var i = 0; i < this.prestamos.length; i++) {
				detalles2.push({
					id_libro:this.prestamos[i].id_libro,
					titulo:this.prestamos[i].titulo,
					describe_estado:this.prestamos[i].describe_estado,
					id_ejemplar:this.prestamos[i].id_ejemplar
					
				})
				var set =new Set(detalles2.map(JSON.stringify))
				var newdetalles = Array.from(set).map(JSON.parse);
			}

			var unprestamo = {
				folio:this.folio,
				fecha_prestamo:this.fecha_prestamo,
				id_usuario:id_usuario,
				newdetalles:newdetalles,
				
			}

			if(newdetalles=="")
			{
				swal({
					text: "No hay datos para realizar el prestamo",
					icon: "warning",
					buttons: ['OK'],
				  })
			}

			else if(detalles2.length!=newdetalles.length){
				swal({
					title: "hay libros repetidos en el prestamo",
					text: "si continua se tomara solo un libro en cuenta ¿desea continuar?",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				  }).then((willDelete) => {
					if (willDelete) {
						this.$http.post(urlPres,unprestamo)
						.then(function(json){
						swal("se ha realizado su prestamo su folio es :"+unprestamo.folio, {
							icon: "success",
						});this.eliminarLibros();
						this.foliarVenta();
						this.id_usuario='';
						document.getElementById("libro").disabled=true;
							}).catch(function(json){
	
						});
						return true;
					}
					else{
						swal("revise los libros repetidos porfavor");
					}
				  });
			}else{
				this.$http.post(urlPres,unprestamo)
				.then(function(json){
					this.eliminarLibros();
					this.foliarVenta();
					this.id_usuario='';
					swal({
						text: "Se ha realizado su prestamo \n su folio es:" + unprestamo.folio,
						icon: "success",

					  })
					document.getElementById("libro").disabled=true;
				}).catch(function(json){
	
				});
				return true;
			}
		}
	},

});
}
window.onload=init;