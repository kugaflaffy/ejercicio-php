<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miau</title>
</head>
<body>
    
    <!--hacemos otro archivo php para crear nuestro menú, así cuando iniciemos sesión nos lleva a otro sitio-->
    <?php
        session_start();
 
        // Validar la autenticación del usuario
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $usuario = $_POST['login'];
            $password = $_POST['password'];
            //pasamos la función que hicimos abajo y creamos $rol
            if (validar($usuario, $password)) {
                $_SESSION["usuario"] = $usuario;
                if ($usuario =="admin") {
                    $_SESSION["rol"] = "jefe";
                }else{
                    $_SESSION["rol"] = "normal";
                }
                // Establecer una cookie de sesión con el nombre del usuario
                setcookie('usuario', $usuario, time() + 3600, '/');
                
                echo 'Bienvenido ' . htmlspecialchars($usuario) . '! ---->';
                tiempo();
            } else {
                echo 'Usuario o contraseña incorrectos';
                header('Location: embebidito.php');
                exit();
            }

        }

        // Función para validar el usuario y la contraseña poniendo los dos usuarios
        function validar($usuario, $password) {
            // Comprueba que lo que introducimos es correcto
            if (($usuario == 'admin' && $password == '1234') || ($usuario == 'cliente1' && $password == 'miau')) {
                return true;
            }else {
                return false;
            }
            
        }

        // Función para obtener la fecha y hora actual
        function tiempo() {
            $fecha_actual = date("d-m-Y h:i:s");
            echo 'La fecha y hora de acceso es: '.$fecha_actual;
        }
        //metemos todo en un if grande para ver si está activa activa la sesión del usuario
        if (isset($_SESSION["usuario"])) {
    ?>


    <form action="index.php" method="get">
        <label for="name">1. Obtener la ruta actual en la que nos encontramos</label>
        <input type="submit" id="rutita" name="rutita"> 
    </form>

    <?php 
        //hago un form para cada ejercicio
    if(isset($_GET["rutita"])){
        $ruta = getcwd(); //con esto la obtenemos ya 
        echo 'Ruta actual: '.$ruta;
    } 
    ?>

    <form action="index.php" method="post">
        <label for="name">2. Buscar un fichero</label>
        <input type="text" name="nombre_archivo">
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php 
    if (isset($_POST['buscar'])) {
        $nombre_archivo = $_POST['nombre_archivo'];
        if(file_exists($nombre_archivo)){ //si el archivo existe me lo dice
            echo "El archivo $nombre_archivo existe.";
        } else{
            echo "El archivo $nombre_archivo no existe";
        }
    }
    ?>

    <?php
        if ($_SESSION["rol"] == "jefe") { //en caso de que sea el admin/jefe el que inicie sesión saldrá esto sino no
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
        }   

    if (isset($_POST['crear_archivo'])) {
        $nombre_archivo = $_POST['nombre_archivo'];
        $contenido = $_POST['contenido'];
        $permisos = $_POST['permisos'];

        $archivo = fopen($nombre_archivo, 'w');

        if ($archivo) {
            fwrite($archivo, $contenido);
            chmod($nombre_archivo, octdec($permisos)); //le damos permisos, escribimos...
            fclose($archivo);
            echo "Se ha creado el archivo";
        } else {
            echo "No se pudo crear";
        }
    }
}else{
   header('Location: embebidito.php'); //y volvemos al login
}

//el siguien5te form será para cerrar sesión
    ?>
    <form action="cerrar.php" method="post">
        <input type="submit" name="cerrar_sesion" value="log out">
    </form>
</body>
</html>