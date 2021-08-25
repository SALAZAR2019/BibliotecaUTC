var	route= document.querySelector("[name=route]").value;
var ulrLibros = route + '/apilibros';
var urlli= ulrLibros +'/';


new Vue({
	el:'#libros',

	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		libros:[],
		user:'hola',
		id_libro:'',
		codigo:'',
		ISBN:'',
		titulo:'',
		autor:'',
		idioma:'',
		edicion:'',
		editorial:'',
		paginas:'',
		ejemplares:'',
		descripcion:'',
		ubicacion:'',
		foto:'',
		activo:'',
		created_at:'',
		updated_at:'',
		// id_carrera:'',
		// id_materia:'',
		editando:false,
		buscar:'',

	},

	created:function(){
		this.getLibros();
		// this.getBuscar();
	},

	methods:{
		getLibros:function(){
			this.$http.get(ulrLibros)
			.then(function(json){
				this.libros=json.data;
			});
		},

		// getBuscar:function(){
		// 	this.$http.get(url)
		// 	.then(function(json){
		// 		this.libros=json.data;
		// 	});
		// },
		showModal:function(){
			$('#add_libros').modal('show');
			this.limpiar();
		},

		agregarLibro:function()
		{
			// construir un objeto que necesitamos por el api
			var Libro={id_libro:this.id_libro,
				codigo:this.codigo,
				ISBN:this.ISBN,
				titulo:this.titulo,
				autor:this.autor,
				edicion:this.edicion,
				editorial:this.editorial,
				paginas:this.paginas,
				idioma:this.idioma,
				ejemplares:this.ejemplares,
				descripcion:this.descripcion,
				ubicacion:this.ubicacion,
				foto:this.foto,
				activo:this.activo,
				created_at:this.created_at,
				updated_at:this.updated_at,}
				// id_carrera:this.id_carrera,
				// id_materia:this.id_materia}
				// limpiar campos
				this.id_libro='';
				this.codigo='';
				this.ISBN='';
				this.titulo='';
				this.autor='';
				this.edicion='';
				this.editorial='';
				this.paginas='';
				this.idioma='';
				this.ejemplares='';
				this.descripcion='';
				this.ubicacion='';
				this.foto='';
				this.activo='';
				this.created_at='';
				this.updated_at='';
				// this.id_carrera='';
				// this.id_materia='';
				// para un metodo store se necesita un post
				this.$http.post(ulrLibros,Libro)
				.then(function(response){
					
					this.getLibros();
					$('#add_libros').modal('hide');
				});
		},

		// agregarMedico:function(){
		// 	var usuarios = {
		// 		cedula:this.cedula,
		// 		nombre:this.nombre,
		// 		apellidop:this.apellidop,
		// 		apellidom:this.apellidom,
		// 		nivel_estudio:this.nivel_estudio,


		// 	}
		// 		this.matricula='';
		// 		this.nombre='';
		// 		this.apellidop='';
		// 		this.apellidom='';
		// 		this.idcarrera='';
		// 	this.$http.post(url,usuarios)
		// 	.then(function(json){
		// 		alert('usuario agregado con exito');
		// 		this.getMedicos();
		// 		// console.log(json);
		// 		this.editando2=true;
		// 	});
			
		// },
		showLibros:function(id){
			this.$http.get(urlli+id)
			.then(function(json){
				this.id_libro=json.data.id_libro;
				this.codigo=json.data.codigo;
				this.ISBN=json.data.ISBN;
				this.titulo=json.data.titulo;
				this.autor=json.data.autor;
				this.edicion=json.data.edicion;
				this.editorial=json.data.editorial;
				this.paginas=json.data.paginas;
				this.idioma=json.data.idioma;
				this.ejemplares=json.data.ejemplares;
				this.descripcion=json.data.descripcion;
				this.ubicacion=json.data.ubicacion;
				this.foto=json.data.foto;
				this.activo=json.data.activo;
				this.created_at=json.data.created_at;
				this.updated_at=json.data.updated_at;
				// this.id_carrera=json.data.id_carrera;
				// this.id_materia=json.data.id_materia;
				
				
				this.editando=true;

			})	
		},

		eliminarLibro:function(id_libro){
			var resp=confirm("se eliminara el Libro")
			if (resp==true) {
				this.$http.delete(urlli+id_libro)
				.then(function(json){
					this.getLibros();
				})
			}
		},
		updateLibros:function(id){
			// crear un json 
			var lib={id_libro:this.id_libro,
					codigo:this.codigo,
					ISBN:this.ISBN,
					titulo:this.titulo,
					autor:this.autor,
					edicion:this.edicion,
					editorial:this.editorial,
					paginas:this.paginas,
					idioma:this.idioma,
					ejemplares:this.ejemplares,
					descripcion:this.descripcion,
					ubicacion:this.ubicacion,
					foto:this.foto,
					activo:this.activo,
					created_at:this.created_at,
					updated_at:this.updated_at,}
					// id_carrera:this.id_carrera,
					// id_materia:this.id_materia,}
		    console.log();



			this.$http.patch(ulrLibros+'/'+ id,lib)
			.then(function(json){
				this.getLibros();
				this.limpiar();
			})
		},
		limpiar:function(){
			
				this.id_libro='';
				this.codigo='';
				this.ISBN='';
				this.titulo='';
				this.autor='';
				this.edicion='';
				this.editorial='';
				this.paginas='';
				this.idioma='';
				this.ejemplares='';
				this.descripcion='';
				this.ubicacion='';
				this.foto='';
				this.activo='';
				this.created_at='';
				this.updated_at='';
				// this.id_carrera='';
				// this.id_materia='';


			this.editando=false;
		},

	},
	computed:{
	
		filtroLibros:function(){
			return this.libros.filter((lib)=>{
				return lib.titulo.match(this.buscar.trim()) ||
				lib.autor.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}	
	}



});