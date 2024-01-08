<?php
        session_start();
 
        // Validar la autenticación del usuario
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $usuario = $_POST['login'];
            $password = $_POST['password'];
            //pasamos la función que hicimos abajo y creamos $rol
            if (validar($usuario, $password)) {
                $_SESSION["usuario"] = $usuario;
                // Establecer una cookie de sesión con el nombre del usuario
                setcookie('usuario', $usuario, time() + 3600, '/');
                
                echo 'Bienvenido ' . htmlspecialchars($usuario) . '!';
                
            } else {
                echo 'Usuario o contraseña incorrectos';
                header('Location: login.php');
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
        if (isset($_SESSION["usuario"])) { 
    ?>
<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de borrar
    if (isset($_POST['delete_user'])) {
        // Verificar si se ha enviado el formulario de eliminación
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            $id = $_POST['id'];

            // Preparar la consulta de eliminación
            $stmt = $pdo->prepare('DELETE FROM sanrio WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecutar la consulta de eliminación
            if ($stmt->execute()) {
                // Redirigir a la misma página después de la eliminación
                header('Location: tabla.php');
                exit;
            } else {
                echo "Error al eliminar el usuario.";
            }
        }
    }
}

// Procesar el formulario de inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    // Verificar que se hayan enviado todos los datos necesarios
    if (
        isset($_POST['nombre']) &&
        isset($_POST['animal']) &&
        isset($_POST['hobby']) &&
        isset($_POST['nacionalidad']) &&
        isset($_POST['fecha'])
    ) {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $animal = $_POST['animal'];
        $hobby = $_POST['hobby'];
        $nacionalidad = $_POST['nacionalidad'];
        $fecha = $_POST['fecha'];

        // Preparar la consulta de inserción
        $stmt = $pdo->prepare('INSERT INTO sanrio (nombre, animal, hobby, nacionalidad, fecha) VALUES (:nombre, :animal, :hobby, :nacionalidad, :fecha)');
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':animal', $animal, PDO::PARAM_STR);
        $stmt->bindParam(':hobby', $hobby, PDO::PARAM_STR);
        $stmt->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);

        $fechaFormateada = date('Y-m-d', strtotime($fecha));
        $stmt->bindParam(':fecha', $fechaFormateada, PDO::PARAM_STR);

        // Ejecutar la consulta de inserción
        if ($stmt->execute()) {
            // Redirigir a la misma página después de la inserción
            header('Location: tabla.php');
            exit;
        } else {
            echo "Error al insertar el usuario.";
        }
    }
}
// Obtener la lista de usuarios
$stmt = $pdo->prepare('SELECT * FROM sanrio');
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PDO</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id ="uno">
   <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="animal">Animal:</label>
        <input type="text" name="animal" required>
        <br>
        <label for="hobby">Hobby:</label>
        <input type="text" name="hobby" required>
        <br>
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" name="nacionalidad" required>
        <br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>
        <br>
        <input type="submit" name="guardar" value="Guardar">
    </form> 
</div>


<img src="https://i.pinimg.com/originals/c4/8a/86/c48a8637251050cc9558f6c414dc9041.png" alt="Imagen">
<h2>Usuarios</h2>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Animal</th>
            <th>Hobby</th>
            <th>Nacionalidad</th>
            <th>Fecha registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario){ ?>
        <tr>
            <td>
                <p><?php echo $usuario['nombre']; ?></p>
            </td>
            <td>
                <p><?php echo $usuario['animal']; ?></p>
            </td>
            <td>
                <p><?php echo $usuario['hobby']; ?></p>
            </td>
            <td>
                <p><?php echo $usuario['nacionalidad']; ?></p>
            </td>
            <td>
                <p><?php echo $usuario['fecha']; ?></p>
            </td>
            <td>
                    <!-- Agregar botón Eliminar -->
                    <form method="post" action="tabla.php">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <input type="submit" name="delete_user" value="Eliminar">
                    </form> 

                    <!--para editar, sirve para coger el id que selecionemos y poder editarlo -->
                    <a href="update.php?id=<?php echo $usuario['id']; ?>">Editar</a>

                </td>
        </tr>
        
        <?php }}
        else{
            header('Location: login.php'); //y volvemos al login
        }
        ?>
    
    </tbody>
</table>
<div id="dos">
    <form action="cerrar.php" method="post">
        <input type="submit" name="cerrar_sesion" value="log out">
    </form>
</div>
    
</body>
</html>