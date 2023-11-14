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
  calcularMedia() {
      if (this.notas.length === 0) {
          return 0; // Retorna 0 si no hay notas ingresadas
      }
      let sumatoriaNotas = this.notas.reduce((total, nota) => total + nota, 0);
      let mediaTotal = sumatoriaNotas / this.notas.length;
      return Math.round(mediaTotal * 100) / 100;
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
const alumno1 = new Alumno("Daniel", 24, "DAW", 2, tutor, asignaturas);
const alumno2 = new Alumno("Sebas", 28, "DAW", 2, tutor, asignaturas);
const alumno3 = new Alumno("Bea", 20, "DAW", 2, tutor, asignaturas);
alumno1.notas = [10, 8, 9, 7];
alumno2.notas = [7, 10, 7, 8];
alumno3.notas = [10, 8, 6, 10];

const listaAlumnos = [alumno1, alumno2, alumno3];
for (let i = 0; i < listaAlumnos.length; i++) {
  const alumno = listaAlumnos[i];

  const divAlumnoInfo = document.createElement("div");
  divAlumnoInfo.id = `alumno${i + 1}`;
  document.getElementById("informacionTodosAlumnos").appendChild(divAlumnoInfo);

  const propiedades = ["nombre", "edad", "ciclo", "curso"];
  for (const propiedad of propiedades) {
      const elemento = document.createElement("p");
      elemento.textContent = `${propiedad.charAt(0).toUpperCase() + propiedad.slice(1)}: ${alumno[propiedad]}`;
      divAlumnoInfo.appendChild(elemento);
  }

  const tutorElement = document.createElement("p");
  tutorElement.textContent = `Tutor: ${alumno.tutor.nombre}`;
  divAlumnoInfo.appendChild(tutorElement);

  const asignaturasElement = document.createElement("p");
  asignaturasElement.textContent = `Asignaturas: ${alumno.asignaturas.map(asignatura => asignatura.nombre).join(', ')}`;
  divAlumnoInfo.appendChild(asignaturasElement);
}
// Función para mostrar asignaturas
function mostrarAsignaturas() {
alumno1.mostrarAsignaturas();
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

  // Cambiar el nombre del tutor en cada alumno
  listaAlumnos.forEach(alumno => {
      alumno.tutor.nombre = nuevoNombreTutor;
  });

  // Actualizar la información en el HTML
  for (let i = 0; i < listaAlumnos.length; i++) {
      const alumno = listaAlumnos[i];
      document.getElementById(`alumno${i + 1}`).innerHTML = `
          <br> Nombre: ${alumno.nombre}<br>
          Edad: ${alumno.edad}<br>
          Ciclo: ${alumno.ciclo}<br>
          Curso: ${alumno.curso}<br>
          Tutor: ${alumno.tutor.nombre}<br>
          Asignaturas: ${alumno.asignaturas.map(asignatura => asignatura.nombre).join(', ')}<br>
          Notas Media: ${alumno.calcularMedia()}<br>
      `;
  }
}
//ejercicio 7
// Función para calcular la media por nombre
function calcularMediaPorNombre() {
  const nombreAlumno = document.getElementById("nombreAlumno").value;

  // Buscar el alumno por nombre
  const alumnoEncontrado = buscarAlumnoPorNombre(nombreAlumno);

  if (alumnoEncontrado) {
      const media = alumnoEncontrado.calcularMedia();
      document.getElementById("mediaPorNombre").textContent = `Media del curso para ${nombreAlumno}: ${media}`;
  } else {
      document.getElementById("mediaPorNombre").textContent = `No se encontró un alumno con el nombre ${nombreAlumno}`;
  }
}

// Función para buscar un alumno por nombre
function buscarAlumnoPorNombre(nombre) {
  // Aquí deberías tener una lista de todos tus alumnos
  // Supongamos que tienes un array llamado "listaAlumnos"

  for (let i = 0; i < listaAlumnos.length; i++) {
      if (listaAlumnos[i].nombre.toLowerCase() === nombre.toLowerCase()) {
          return listaAlumnos[i];
      }
  }

  return null; // Retorna null si no se encuentra el alumno
}