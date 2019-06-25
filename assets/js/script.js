//A la escucha del evento LOAD, es decir, que se cargue mi página
window.addEventListener('load', recargar);
//Método recargar
function recargar(){
  var peticion = new XMLHttpRequest;
  peticion.onreadystatechange = function(){
    if(this.readyState == 4){
      document.getElementById('cuerpo').innerHTML = this.responseText;
      asignarEventos()
    }
  };
peticion.open('GET','usuarios/recargar');
peticion.send();
}

//controlador de eventos


function asignarEventos(){

  document.getElementById('btnAgregar').addEventListener('click',accion);
  var btnEditar = document.getElementsByClassName('btnEditar');
  var btnEliminar = document.getElementsByClassName('btnEliminar');

for(var i=0; i < btnEditar.length;i++){
  btnEditar[i].addEventListener('click', actualizar);
  btnEliminar[i].addEventListener('click', eliminar);
}
}




function accion(){

  var nombre = document.getElementById('txtNombre').value;
  var apellido = document.getElementById('txtApellido').value;

  var peticion = new XMLHttpRequest;
  peticion.onreadystatechange = function(){
    if(this.readyState == 4){
      document.getElementById('cuerpo').innerHTML = this.responseText;
     // recargar();
    //  limpiar();
    }
  };

  peticion.open('POST','usuarios/ingresar');
  peticion.setRequestHeader('Content-type', 'application/x-www-form-urlenconded');
  // peticion.send('nombre='+nombre+'&apellido='+apellido);

//  var datos = new FormData;
//  datos.append('nombre', nombre);
//  datos.append('apellido', apellido);

  peticion.send('nombre='+nombre+'&apellido='+apellido);

}


function actualizar(){
  alert('Boton actualizar');
  
}
function eliminar(){
  alert('Boton eliminar');
  
}

function limpiar(){
document.getElementById('txtNombre').value = '';
document.getElementById('txtApellido').value = '';

}