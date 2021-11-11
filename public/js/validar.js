var btnEnviar = document.getElementById("btnEnviar");
var btnUser=document.getElementById("btnUser");
var caja1 = document.getElementById("id_usuario");
var caja2 = document.getElementById("libro");

btnEnviar.disabled = true;
btnUser.disabled = true;
caja2.disabled = true;

function verificar2(valor) {
  if (valor.length>=1){
    btnEnviar.disabled = false;
    btnEnviar.classList.remove("disabled");
    document.getElementById("btnEnviar").disabled=false;
  } else {
      btnEnviar.disabled = true;
      document.getElementById("btnEnviar").disabled=true;
  }
}

function verificar(valor) {
  if (valor.length===8){
  	caja2.style.background = "#FFFFFF";
    caja2.disabled = false
    document.getElementById("btnUser").disabled=false;
  }else{
    caja2.style.background = "grey";
    caja2.disabled = true;
    btnEnviar.disabled = true;
    document.getElementById("libro").disabled=true;
  }
}

var clicando= false;

// Evento de click del primer botón
$("#btn-dobleclick").click(function() {
  // Mostramos el Alert
  alert( "Handler for dobleclick.click() called." );
});

// Evento del segundo boton
$("#btnUser").click(function() {
  // Si ha sido clicado
  if (clicando){
    // Mostramos que ya se ha clicado, y no puede clicarse de nuevo
    alert( "Que ya he realizado un click." );
  // Si no ha sido clicado
  } else {
    // Le decimos que ha sido clicado
    clicando= true;
    // Mostramos el mensaje de que ha sido clicado
    alert( "Handler for only1click.click() called." );
  }
});