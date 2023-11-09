class Tutor {
    //creamos clase de tutor, asignatura y alumno con un constructor pasando valores
    constructor(nombre, edad, dni, tituloUniversitario) {
        this.nombre = nombre;
        this.edad = edad;
        this.dni = dni;
        this.tituloUniversitario = tituloUniversitario;
    }
    // Método para mostrar los datos del tutor
    devolverDatos() {
        const datosList = document.getElementById("resultado");
        datosList.innerHTML = ''; // Limpiar la lista antes de mostrar los datos del tutor
    
        const li = document.createElement("li");
        li.textContent = `Nombre: ${this.nombre}, Edad: ${this.edad}, DNI: ${this.dni}, Título Universitario: ${this.tituloUniversitario}`;
        datosList.appendChild(li);
    }

}

class Asignatura {
    constructor(nombre, curso, horasTotales) {
        this.nombre = nombre;
        this.curso = curso;
        this.horasTotales = horasTotales;
    }
  cambiarHora(nueva){
    this.horasTotales = nueva;
  }
}

class Alumno {
    constructor(nombre, edad, ciclo, curso, tutor, asignaturas) {
        this.nombre = nombre;
        this.edad = edad;
        this.ciclo = ciclo;
        this.curso = curso;
        this.tutor = tutor;
        this.asignaturas = asignaturas;
        this.notas = new Array(asignaturas.length);
    }

  mostrarDatos() {
    let datos = '';
    for (const key in this) {
      if (typeof this[key] !== 'function') {
        datos += `${key}: ${this[key]}, `;
      }
    }
    const datosSinUltimaComa = datos.slice(0, -2);
    document.getElementById("infoAlumno").textContent = datosSinUltimaComa;
  }

  mostrarAsignaturas() {
    const asignaturasList = document.getElementById("asignaturas");
    asignaturasList.innerHTML = ''; // Limpiar la lista antes de mostrar las asignaturas

    this.asignaturas.forEach(asignatura => {
      const li = document.createElement("li");
      li.textContent = `${asignatura.nombre} (curso ${asignatura.curso}, ${asignatura.horasTotales} horas totales)`;
      asignaturasList.appendChild(li);
    });
  }
}

// Definir asignaturas
const asignatura1 = new Asignatura("Programación", 2, 120);
const asignatura2 = new Asignatura("Lenguajes de Marcas", 2, 80);
const asignatura3 = new Asignatura("Base de Datos", 2, 134);
const asignatura4 = new Asignatura("Interfaces", 2, 100);

const asignaturas = [asignatura1, asignatura2, asignatura3, asignatura4];

const tutor = new Tutor("Caro", 40, "12345678C", "Ingeniera informática");
const alumno = new Alumno("Daniel", 24, "DAW", 2, tutor, asignaturas);
alumno.notas = [10, 8, 9, 7];

// Mostrar la información en el HTML
document.getElementById("nombre").textContent = alumno.nombre;
document.getElementById("edad").textContent = alumno.edad;
document.getElementById("ciclo").textContent = alumno.ciclo;
document.getElementById("curso").textContent = alumno.curso;
document.getElementById("tutor").textContent = alumno.tutor.nombre;

// Función para mostrar asignaturas
function mostrarAsignaturas() {
  alumno.mostrarAsignaturas();
}
function cambiarHora() {
    const asignaturaSeleccionadaIndex = parseInt(document.getElementById("seleccionada").value);
    const number = parseInt(document.getElementById("number").value);
  
    if (isNaN(number)) {
      alert("Ingrese un número válido para las nuevas horas.");
      return;
    }
  
    // Verificar que el índice sea válido
    if (asignaturaSeleccionadaIndex >= 0 && asignaturaSeleccionadaIndex < asignaturas.length) {
      asignaturas[asignaturaSeleccionadaIndex].cambiarHora(number);
      mostrarAsignaturas(); // Actualizar la visualización de las asignaturas
    } else {
      alert("Selecciona una asignatura válida");
    }
}
//Ejercicio 5

 
function cambiarTutor() {
    const nuevoNombreTutor = document.querySelector('input[id="tutor"]').value;
    tutor.nombre=nuevoNombreTutor;
    document.getElementById("tutor").textContent = tutor.nombre;
}