<?php
include "config.php";

if (isset($_GET['id'])) { //Se verifica si se proporcionó un ID en la URL
    $id = $_GET['id']; //Se obtiene el ID del usuario de la URL
    $stmt = $pdo->prepare('SELECT * FROM sanrio WHERE id = :id'); //Se prepara una consulta SQL para seleccionar la información del usuario con el ID proporcionado
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); //Se vincula el parámetro :id en la consulta SQL al valor de $id
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC); //Se obtiene la información del usuario como un array asociativo

    if (!$usuario) {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "Se necesita un ID válido.";
    exit;
}

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $animal = $_POST['animal'];
    $hobby = $_POST['hobby'];
    $nacionalidad = $_POST['nacionalidad'];
    $fecha = $_POST['fecha'];

    $stmt = $pdo->prepare('UPDATE sanrio 
                           SET nombre = :nombre,
                               animal = :animal,
                               hobby = :hobby,
                               nacionalidad = :nacionalidad,
                               fecha = :fecha
                           WHERE id = :id');
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR); // Se vinculan los parámetros de la consulta a las variables PHP.
    $stmt->bindParam(':animal', $animal, PDO::PARAM_STR);
    $stmt->bindParam(':hobby', $hobby, PDO::PARAM_STR);
    $stmt->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo "Usuario actualizado exitosamente.";
    } catch (PDOException $error) {
        echo "Error al actualizar el usuario: " . $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="update.css">
    
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>"> <!--Cada campo de entrada está prellenado con la información actual del usuario -->

        <label for="animal">Animal</label>
        <input type="text" name="animal" value="<?php echo htmlspecialchars($usuario['animal']); ?>">

        <label for="hobby">Hobby</label>
        <input type="text" name="hobby" value="<?php echo htmlspecialchars($usuario['hobby']); ?>">

        <label for="nacionalidad">Nacionalidad</label>
        <input type="text" name="nacionalidad" value="<?php echo htmlspecialchars($usuario['nacionalidad']); ?>">

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="<?php echo htmlspecialchars($usuario['fecha']); ?>">

        <input type="submit" name="submit" value="Editar">
    </form>
    <a href="tabla.php">Volver</a>
</body>
</html>
