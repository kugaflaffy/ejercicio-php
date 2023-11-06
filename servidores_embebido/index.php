<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miau</title>
</head>
<body>
    <!--hacemos otro archivo php para crear nuestro menu, así cuando iniciermos sesión nos lleva a otro sitio-->
    <?php
        //este if nos servirá para verificar que lo que hemos enviado está
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $usuario = $_POST['login'];
            $password = $_POST['password'];
            if (validar($usuario, $password)) {
                echo 'Bienvenido :D! ---->';
                tiempo();
            } else {
                //si se valida nos da la bienvenida y si no nos debuelber al login vaciando el usuario y la contraseña incorrecta
                echo 'incorrecto';
                header('Location: embebidito.php');
            }
        } 

        function validar($usuario, $password) {
            //esta funcon comprueba que lo que introducimos es correcto, la llamamos desde el if de arriba
            if ($usuario == 'admin' && $password == '1234') {
                return true;
            }
            return false;
        }
        function tiempo(){ //para obtener la fecha y hora actual
            $fecha_actual = date("d-m-Y h:i:s");
            echo 'la fecha y hora de acceso es: '.$fecha_actual;
        }
    ?>
    <form action="index.php" method="get">
        <label for="name">1. Obtener la ruta actual en la que nos encontramos</label>
        <input type="submit" id="rutita" name="rutita"> 
    </form>
    <?php 
    //para obtener la ruta usaremos get para obtener los datos que queremoa
    //usamos un if para comprabar nque lo enviado está y pedimos la ruta
        if(isset($_GET["rutita"])){
           $ruta = $_SERVER['REQUEST_URI'];
            echo 'Ruta actual: '.$ruta;
        } 
    ?>
    <form action="index.php" method="post">
        <label for="name">2. Buscar un fichero</label>
        <input type="text" name="nombre_archivo">
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <?php 
        //para buscar un fichero usaremos el metodo post porque estamos pidiendo la información que queremos, si existe nos devuelve le fichero
        if (isset($_POST['buscar'])) {
            $nombre_archivo = $_POST['nombre_archivo'];
            if(file_exists($nombre_archivo)){
            echo "El archivo $nombre_archivo existe.";
            } else{
            echo "El archivo $nombre_archivo no existe";
            }
        }
    ?>
     <form action="index.php" method="post">
        <label for="name">3. Crear un nuevo fichero con opciones de permisos y escribir en él</label><br>
        <label for="nombre_archivo">Nombre:</label>
        <input type="text" name="nombre_archivo" required><br>

        <label for="contenido">Escribe algo dentro:</label>
        <textarea name="contenido" required></textarea><br>

        <label for="permisos">Permisos (ej. 0644):</label>
        <input type="text" name="permisos" required><br>

        <input type="submit" name="crear_archivo" value="Crear Archivo">
    </form>
    <?php
    //usamos el metodo post porque estamos creando y metiendo datos
        if (isset($_POST['crear_archivo'])) {
            $nombre_archivo = $_POST['nombre_archivo'];
            $contenido = $_POST['contenido'];
            $permisos = $_POST['permisos'];

            //intenta abrir el archivo para escritura (crea el archivo si no existe).
            $archivo = fopen($nombre_archivo, 'w');

            if ($archivo) {
                //scribe el contenido
                fwrite($archivo, $contenido);

                //establece los permisos
                chmod($nombre_archivo, octdec($permisos));

                //cierra el archivo.
                fclose($archivo);

                echo "Se ha creado el archivo";
            } else {
                echo "No se pudo crear";
            }
        }
?>
</body>
</html>