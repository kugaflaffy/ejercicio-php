<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
      <label>Nombre</label>
      <input id="nom" name="nom" type="text" value="">
      <label>Animal</label>
      <input id="animal" name="animal" type="text" value="">
      <label>Hobby</label>
      <input id="hobby" name="hobby" type="text" value="">
      <label>Nacionalidad</label>
      <input id="nac" name="nac" type="text" value="">
      <label>Fecha de registro</label>
      <input id="fecha" name="fecha" type="date" value="">
      <input type="button" class="btn" value="guardar">

      <table> 
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Animal</th>
                <th>Hobby</th>
                <th>Nacionalidad</th>
                <th>Fecha registro</th>
                <th></th>
            </tr>
        </thead>
      </table>
</body>
</html>