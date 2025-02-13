
var	route= document.querySelector("[name=route]").value;
var urlLib = route + '/apiPrestamo';
var urlPres= route +'/apiPrestamo';

var urlUser=route+'/ApiUsuario';
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
		this.getlib();
		this.foliarVenta();
	},

	data:{
		nombre:'QUE ONDA',
		libros:[],
		prestamos:[],
		ejemplares:[],
		users:[],
		codigo:'',
		id_libro:'',
		id_ejemplar:'',
		ISBN:'',
		id_usuario:'',
		titulo:'',
		activo:'',
		pago:0,
		tot:0,
		enviando:false,
		folio:'',
		fecha_prestamo:moment().format('YYYY-MM-DD'), //almacena fecha.
	},
	// area de metodos
	methods:{

		getlib:function(){
			this.$http.get(urlLib)
			.then(function(json){
				this.ejemplares=json.data;
				//console.log(json);
			});
		},

		getLibros:function(){
			this.$http.get(urlLib,this.codigo)
			.then(function(json){
				
				this.ejemplares=json.data;
				
				var detalles2 = [];

				for (var i = 0; i < this.ejemplares.length; i++) {
					detalles2.push({
						titulo:this.ejemplares[i].titulo,
						codigo:this.ejemplares[i].codigo,
						ISBN:this.ejemplares[i].ISBN,
					})
					var set =new Set(detalles2.map(JSON.stringify))
					var newdetalles = Array.from(set).map(JSON.parse);
				}
				var libro = this.codigo;
				const newArray = newdetalles.filter(ejemplar => ejemplar.codigo == libro).map(JSON.stringify);
				
				if(newArray==""){
					Swal.fire("Verifique el dato ingresado",{
						icon: "alert",
					});
				}
				else{
				const myObj = JSON.parse(newArray);

				if (myObj){
					this.prestamos.push(myObj);
				}
				}
	
				this.codigo='';
				this.$refs.buscar.focus();
				

			})
		},
		getUser:function(){
			this.$http.get(urlUser + '/' + this.id_usuario)
			.then(function(json){
				document.getElementById("btnUser").disabled=true;

				if(json.data !=""){
				Swal.fire({
					title: 'Please Wait',
					timer:800,
					onOpen: ()=>{
						Swal.showLoading();
					}
				}).then((result)=>{
			
					var user={'id_usuario':json.data.id_usuario,
					'nombres':json.data.nombres,
					'apellido_p':json.data.apellido_p,
					'correo':json.data.correo,
					}

					if (user.id_usuario){
						this.users.push(user);
						document.getElementById("id_usuario").disabled=true;
						document.getElementById("btnUser").disabled=true;
						document.getElementById("libro").disabled=false;
						document.getElementById("btnEnviar").disabled=false;
	
					}
				});
				}
				if(json.data===""||caja1 ===""){
					Swal.fire({
						text: "Dato incorrecto o no disponible intente de nuevo ",
						icon: "warning",
						buttons: ['OK'],
					  })
					document.getElementById("btnEnviar").disabled=true;
					document.getElementById("btnUser").disabled=true;
					this.id_usuario='';
				}


			})
		},

		eliminarLibro:function(id){
			this.prestamos.splice(id,1);
		},
		eliminarUser:function(id){
			this.users.splice(id,1);
			document.getElementById("id_usuario").disabled=false;
			document.getElementById("btnUser").disabled=false;
			document.getElementById("btnEnviar").disabled=true;
			document.getElementById("libro").disabled=true;
			this.eliminarLibros();
		},
		eliminarLibros:function(id){
			this.prestamos.splice(id);
			this.id_usuario="";
		}, 

		foliarVenta:function(){
			this.folio='VTA-' + moment().format('YYMMDDhmmss');
		},
		
		prestamo:function(){
			
			var detalles = [];
			var newdetalles =[];

			var id_usuario = document.getElementById("id_usuario").value;

			document.getElementById("btnpre").disabled=true;

			for (var i = 0; i < this.prestamos.length; i++) {
				detalles.push({
					titulo:this.prestamos[i].titulo,
					codigo:this.prestamos[i].codigo,
					ISBN:this.prestamos[i].ISBN,
					
				})
				var set =new Set(detalles.map(JSON.stringify))
				var newdetalles = Array.from(set).map(JSON.parse);
			}
			console.log(detalles)
			var unprestamo = {
				folio:this.folio,
				fecha_prestamo:this.fecha_prestamo,
				id_usuario:id_usuario,
				newdetalles:newdetalles,
				
			}
			console.log(unprestamo)
			if(newdetalles=="")
			{
				Swal.fire({
					text: "No hay datos para realizar el prestamo",
					icon: "warning",
					buttons: ['OK'],
				  })
				  document.getElementById("btnpre").disabled=false;
			}
			else if(detalles.length!=newdetalles.length){
				Swal.fire({
					title: "hay libros repetidos en el prestamo",
					text: "Si continua se tomará solo un libro en cuenta ¿desea continuar?",
					icon: "warning",
					showCancelButton: true,
					confirmButtonText:"Si, deseo continuar",
					cancelButtonText:"cancelar",
					dangerMode: true,
				  }).then(resultado => {
					if (resultado.value) {
						this.$http.post(urlPres,unprestamo)
						.then(function(json){
						Swal.fire("Se ha realizado su prestamo su folio es :"+unprestamo.folio, {
							icon: "success",
						}).then((result)=>{
						this.eliminarLibros();
						this.eliminarUser();
						this.foliarVenta();
						this.id_usuario='';
						document.getElementById("libro").disabled=true;
						document.getElementById("btnpre").disabled=false;
							})
						}).catch(function(json){
	
						});
						return true;
					}
					else{
						Swal.fire("Revise los libros repetidos porfavor");
						document.getElementById("btnpre").disabled=false;
					}
				});
			}else{
				document.getElementById("btnpre").disabled=true;
					swal({
						title:"Se ha realizado su prestamo su folio es :"+unprestamo.folio,
						icon: "success",
					}).then((result)=>{
						this.getlib();
						this.eliminarLibros();
						this.eliminarUser();
						this.foliarVenta();
						this.id_usuario='';
						document.getElementById("libro").disabled=true;
						document.getElementById("btnpre").disabled=false;
						this.$http.post(urlPres,unprestamo)
							.then(function(json){
						}).catch(function(json){	
					});
					return true;
				});				
			}
		}
	},
});
}
window.onload=init;