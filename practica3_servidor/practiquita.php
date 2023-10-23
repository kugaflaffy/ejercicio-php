<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practiquita</title>
</head>
<body>
    <div>
        <h1>ejercicio 1</h1>
    </div>
    <form action="practiquita.php" method="post">
        <label for="name">Total gastado:</label>
        <input type="text" id="" name="calculito" />
        <button type="submit">Calcular</button>
    </form>  
    <?php 
        if(isset($_POST["calculito"])){ //ponemos condiciones usando muchos elseif para que nos funcione
            $calculito = $_POST["calculito"];
            if($calculito <50){
                echo "los gastos de envío serán de 3,95€";
            }else if($calculito >50 && $calculito<75){
                echo "los gastos de envío serán de 2,95€";
            }else if($calculito>75 && $calculito<100){
                echo "los gastos de envío serán de 1,95€";
            }else if($calculito>100){
                echo "los gastos de envío son gratuitos";
            }
        }
    ?> 
    <div>
        <h1>ejercicio 2</h1>
    </div>
    <form action="practiquita.php" method="post">
        <label for="name">Total gastado:</label>
        <input type="text" id="" name="operacioncita" />
        <button type="submit">Calcular</button>
    </form>  
    <?php 
    //lo mismo que el 1 pero en switch
        if(isset($_POST["operacioncita"])){
            $operacioncita = $_POST["operacioncita"];
            switch (true) {
                case $operacioncita <50:
                    echo "los gastos de envío serán de 3,95€";
                    break;
                case $operacioncita >50 && $operacioncita<75:
                    echo "los gastos de envío serán de 2,95€";
                    break;
                case $operacioncita>75 && $operacioncita<100:
                    echo "los gastos de envío serán de 1,95€";
                    break;
                case $operacioncita>100:
                    echo "los gastos de envío son gratuitos";
                    break;
                default:
                    echo "es opción no está disponible";
            } 
        }
    ?> 
    <div>
        <h1>ejercicio 3</h1>
    </div>
    <form action="practiquita.php" method="post">
        <label for="name">Escribe 5 números:</label>
        <input type="text" id="0" name="numeritos[]" />
        <input type="text" id="1" name="numeritos[]" />
        <input type="text" id="2" name="numeritos[]" />
        <input type="text" id="3" name="numeritos[]" />
        <input type="text" id="4" name="numeritos[]" />
        <button type="submit">Calcular</button>
    </form>  
    <?php 
        if(isset($_POST["numeritos"])){
            $numeritos = $_POST["numeritos"];
            $mayor = $numeritos[0];
            //con este for podremos comparar los numeros y saber cual será mayor
            for ($i=0; $i<5 ; $i++) { 
                if ($numeritos[$i]>$mayor){
                    $mayor = $numeritos[$i];
                }
            }
            echo "el número ".$mayor." es el más grande";
        }
    ?> 
    <div>
        <h1>ejercicio 4</h1>
    </div>
    <form action="practiquita.php" method="post">
        <label for="name">El contenido es:</label>
        <input type="submit" id="" name="calculito"> 
    </form>  
    <?php 
        if(isset($_POST["calculito"])){
            $calculito = $_POST["calculito"];
            $array = array(array(3,1), array(2,0));
            //recorremos los dos arrays con este foreach
            foreach ($array as $fila) {
                foreach($fila as $elemento){
                    echo "$elemento";
                }
                echo "<br>";
            }
            
        }
    ?>
    <div>
        <h1>ejercicio 5</h1>
    </div>
    <form action="practiquita.php" method="post">
        <label for="name">El contenido es:</label>
        <input type="submit" id="" name="sumita"> 
    </form>  
    <?php 
        if(isset($_POST["sumita"])){
            $array = array(array(1, 0), array(0, 1));
            $arraycito = array(array(0, 1), array(1, 0));
            
            $resultado = array(); // almacenar la suma
            //con estos for sumamos por posición
            for ($i = 0; $i < count($array); $i++) {
                $fila = array();
                for ($j = 0; $j < count($array[$i]); $j++) {
                    $fila[] = $array[$i][$j] + $arraycito[$i][$j];
                }
                $resultado[] = $fila;
            }
            
            // imprimimos el resultado
            foreach ($resultado as $fila) {
                foreach ($fila as $elemento) {
                    echo "$elemento ";
                }
                echo "<br>";
            }
        } 
    ?>
</body>   
