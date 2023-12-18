<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prueba AJAX</title>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<button id="ajaxButton">Realizar llamada Ajax</button>

<div id="resultado"></div>

<script>
// Espera a que el documento HTML esté completamente cargado antes de ejecutar el código
$(document).ready(function(){
// Asocia la función al evento de clic del botón con ID 'ajaxButton'
$("#ajaxButton").click(function(){
// Realiza la llamada Ajax utilizando jQuery
$.ajax({
// Especifica la URL a la que se realiza la solicitud
url: 'http://127.0.0.1:8000/DameAnimales',// Espera a que el documento HTML esté completamente cargado antes de ejecutar el código
$(document).ready(function(){
// Asocia la función al evento de clic del botón con ID 'ajaxButton'
$("#ajaxButton").click(function(){
// Realiza la llamada Ajax utilizando jQuery
$.ajax({
// Especifica la URL a la que se realiza la solicitud
url: 'http://127.0.0.1:8000/DameAnimales',
// Especifica el método HTTP (GET en este caso)
type: "GET",
// Especifica el tipo de datos que se espera del servidor (JSON en este caso)
dataType: 'json',
// Función que se ejecuta si la solicitud Ajax es exitosa
success: function(response) {
// Manipula la respuesta obtenida
console.log(response.datos); // Muestra la respuesta en la consola del navegador
$('#resultado').text('Respuesta del Servidor: ' + response.datos); // Muestra la respuesta en el elemento con ID 'resultado'
},
// Función que se ejecuta si hay un error en la solicitud Ajax
error: function(error) {
console.log("Error: ", error); // Muestra el error en la consola del navegador
}
});
});
});
// Especifica el método HTTP (GET en este caso)
type: "GET",
// Especifica el tipo de datos que se espera del servidor (JSON en este caso)
dataType: 'json',
// Función que se ejecuta si la solicitud Ajax es exitosa
success: function(response) {
// Manipula la respuesta obtenida
console.log(response.datos); // Muestra la respuesta en la consola del navegador
$('#resultado').text('Respuesta del Servidor: ' + response.datos); // Muestra la respuesta en el elemento con ID 'resultado'
},
// Función que se ejecuta si hay un error en la solicitud Ajax
error: function(error) {
console.log("Error: ", error); // Muestra el error en la consola del navegador
}
});
});
});
</script>
</body>
</html>