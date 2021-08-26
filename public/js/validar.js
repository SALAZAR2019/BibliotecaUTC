var btnEnviar = document.getElementById("btnEnviar");
var caja1 = document.getElementById("caja1");
var caja2 = document.getElementById("caja2");

btnEnviar.disabled = true;
caja2.disabled = true;

function verificar2(valor) {
  if (valor.length>=1){
    btnEnviar.disabled = false;
    btnEnviar.classList.remove("disabled");
    document.getElementById("btnEnviar").disabled=false;
  } else {
      btnEnviar.disabled = true;
  }
}

function verificar(valor) {
  if (valor.length===7){
  	caja2.style.background = "#FFFFFF";
    caja2.disabled = false
    document.getElementById("caja2").disabled=false;
  } else {
    caja2.style.background = "grey";
    caja2.disabled = true;
    caja2.value = "";
    btnEnviar.disabled = true;
  }
   
}