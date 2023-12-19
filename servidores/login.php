<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>base datitos</title>
    <link rel="stylesheet" href="practica9.css">
</head>
<body>
    <!--ejercicio1-->
    <!--PDO conocido como PHP Data Objects es una extensión de PHP 
    que proporciona una capa de acceso a base de datos. Es una opción versátil y segura para la interacción 
    con la base de datos. Proporciona funciones y ayuda a mejorar la seguridad y portabilidad.
    Las ventajas son: portabilidad(permite cambiar entre diferentes sistemas de gestión de base de datos con facilidad (MySQL, SQLite...)), 
    seguridad(usa sentencias y vincula parámetros que ayudan a prevenir ataques, haciendo las consultas más seguras),
    mantenimiento(usa un código más limpi y más fácil de mantener y entender, facilita la colaboración entre desarrolladores),
    eificiencia(en cuanto al rendimiento, mejorandolo en algunos casos) y 
    soporte para transacciones(permite realizar operaciones en la base de datos garantizando su consistencia).
    -->

    <div class="container">
    <br />
    <br />
    <div class="card">
      <form action="tabla.php" method="POST">
        <label>Nombre</label>
        <input id="nombre" name="login" type="text" value="">
        <label>Contraseña</label>
        <input id="pass" name="password" type="password" value="">
        <input type="submit" class="btn" value="Entrar">
      </form>
    </div>
  </div>
</body>
</html>