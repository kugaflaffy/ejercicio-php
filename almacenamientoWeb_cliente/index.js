function almacenar(){
    const nombre = prompt('pon tu nombre: ');
    if (nombre) {
        let listaActual = JSON.parse(localStorage.getItem('lista')) || [];
        listaActual.push(nombre);
        localStorage.setItem('lista', JSON.stringify(listaActual));
        alert('El nombre se ha guardado');
    }
}

function mostrar(){
    const listaActual = JSON.parse(localStorage.getItem('lista')) || [];
    alert('Lista de nombres: ' + listaActual);
}

function elimElem(){
    const borrarNombre = prompt('¿Qué nombre vas a borrar?: ');
    if (borrarNombre) {
        const listaActual = JSON.parse(localStorage.getItem('lista')) || [];
        const buscar = listaActual.indexOf(borrarNombre);
        if (buscar !== -1) {
            listaActual.splice(buscar, 1);
            localStorage.setItem('lista', JSON.stringify(listaActual));
            alert(borrarNombre + ' ha sido eliminado');
        }else{
            alert('Ese nombre no está en la lista');
        }
    }
}

function LimpCont(){
    localStorage.removeItem('lista');
    alert('Contenido limpio');
}

  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
      .then(registration => {
        console.log('Service Worker registrado con éxito:', registration);
      })
      .catch(error => {
        console.error('Error al registrar el Service Worker:', error);
      });
  }

