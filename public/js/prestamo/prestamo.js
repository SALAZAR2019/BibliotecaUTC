
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
		describe_estado:'',
		activo:'',
		pago:0,
		tot:0,
		
		cantidades:[1,1,1,1,1,1,1],
		folio:'',
		fecha_prestamo:moment().format('YYYY-MM-DD') //almacena cantidades.
	},

	// area de metodos
	methods:{
		getLibros:function(){
			this.$http.get(urlLib + '/' + this.codigo)
			.then(function(json){
				console.log(json);
				// this.codigo='';

				if(json.data===""){
					alert("Libro no se encuentra disponible");
					document.getElementById("btnEnviar").disabled=true;
					this.codigo='';
				}
				var prestamo={'id_libro':json.data.id_libro,
							'id_ejemplar':json.data.id_ejemplar,
							'titulo':json.data.libros.titulo,
							//'cantidades':1,
							'ISBN':json.data.libros.ISBN,
							'describe_estado':json.data.libros.describe_estado,
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

		// fin de getProducto

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
			var id_usuario = document.getElementById("id_usuario").value;

			for (var i = 0; i < this.prestamos.length; i++) {
				detalles2.push({
					id_libro:this.prestamos[i].id_libro,
					titulo:this.prestamos[i].titulo,
					describe_estado:this.prestamos[i].describe_estado,
					id_ejemplar:this.prestamos[i].id_ejemplar
					
				})
				
			}
			console.log(detalles2);
			
			var unprestamo = {
				folio:this.folio,
				fecha_prestamo:this.fecha_prestamo,
				id_usuario:id_usuario,
				detalles:detalles2,
				
			}
			
			console.log(unprestamo);
			if(detalles2=="")
			{
				alert("no hay datos para hacer el prestamo");
			}else{
				alert("se ha realizado su prestamo su folio es :"+unprestamo.folio);
				//location.reload();
			}

			this.$http.post(urlPres,unprestamo)
			.then(function(json){
				this.eliminarLibros();
				this.foliarVenta();
				this.id_usuario='';
				document.getElementById("libro").disabled=true;
			}).catch(function(json){

			});
			return true;
			
			


		}
	},

});
}
window.onload=init;