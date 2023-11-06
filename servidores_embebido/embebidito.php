<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
</head>
<body>
    <form action="index.php" method="post"> <!--aquí estará nuestro login, usaremos un metodo POST para insertar el usuario y la contraseña-->
        <p>Usurio: <input type="text" name="login" /></p>
        <p>Contraseña: <input type="password" name="password" /></p>
        <p><input type="submit" /></p>
    </form>
</body>
</html>