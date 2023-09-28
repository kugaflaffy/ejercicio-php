<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2</title>
</head>
<body>
    <?php
    echo "ejercicio 1";
    echo "<br>";
    echo "a)";
    
    $var = " hola";
    $var2 = "mundo";
    $var3 = $var." ".$var2;
    echo $var3;
    /* creo una variable con el hola, luego otra con mundo, 
    como hay que unirla en una, la concatenamos con el punto y finalmente lo imprimimos*/

    echo "<br>";
    echo "b)";
    $boolean = true;
    echo " variable de tipo boolean: ".$boolean;
    /*declaramos la variable boolean y le damos el valor de true por ejemplo, al imprimierlo
    tiene que devolver 1*/ 

    echo "<br>";
    echo "c)";
    $varFloat = 3.14;
    echo " el número es: ".$varFloat;
    /*declaramos la variable float y la imprimimos con el echo*/

    echo "<br>";
    echo "d)";
    $varArray = array("v1"=>"1","v2" =>"2","v3"=>"3");
    print_r ($varArray);
    /*hacemos un array poniendo todos los valores y lo mostramos con un print_r
    para ver la información*/

    echo "<br>";
    echo "<br>";
    echo "ejercicio 2";
    echo "<br>";
    $boolean = false;
    echo " variable de tipo boolean: ".$boolean;
    /*al ser un boolean falso no nos sale nada porque el false es 0*/

    echo "<br>";
    echo "<br>";
    echo "ejercicio 3";
    echo "<br>";
    $var3 = str_replace(" ","",$var3);
    echo $var3;
    /*utiliamos el str_replace para quitar los espacios, dentro primero ponemos lo que
    queremos sustituir, luego por lo que lo queramos sustituir y finalmente a la variable 
    que la queramos aplicar*/

    echo "<br>";
    echo "<br>";
    echo "ejercicio 4";
    echo "<br>";
    $mensaje = 'El operador "+" sirve para sumar el valor de variables. Con la "/" podemos
    dividir valores entre variables. El símbolo del dólar "$" indica que estamos
    utilizando variables pero no lo usaremos en las constantes o globales.';
    echo $mensaje;
    /**/

    echo "<br>";
    echo "<br>";
    echo "ejercicio 5";
    echo "<br>";
    $mensaje = strlen($mensaje);
    echo $mensaje;
    /**/

    echo "<br>";
    echo "<br>";
    echo "ejercicio 6";
    echo "<br>";
    $variable = array("a", "e", "i", "o", "u");
    $variable = str_replace($variable,"","hello word");
    echo $variable;
    /**/

    echo "<br>";
    echo "<br>";
    echo "ejercicio 7";
    echo "<br>";
    $varUno;
    echo empty($varUno);
    /**/
    
    echo "<br>";
    echo "<br>";
    echo "ejercicio 8";
    echo "<br>";
    $frase = "hello world";
    $varDos = intval($frase);
    echo $varDos;
    /*el 0 es el número entero de hello world, para saberlo usamos el intval*/

    echo "<br>";
    echo "<br>";
    echo "ejercicio 9";
    echo "<br>";
    echo "a)";
    $raiz = sqrt(144);
    echo $raiz;
    /*Usamos la función sqrt y luego imprimimos la variable*/

    echo "<br>";
    echo "b)";
    $potencia = pow(2,8);
    echo $potencia;
    /*Usamos la función pow igualandolo a la variable y después lo imprimimos*/

    echo "<br>";
    echo "c)";
    $division = 100%6;
    echo $division;
    /*para poder dividir usamos el porcentaje y después imprimimos la variable*/

    echo "<br>";
    echo "d)";
    function mcd($a,$b){
        if($b==0)
            return $a;
        else
            return mcd($b,$a%$b);
    }
    echo mcd(3,6);
    /*se llama a la función con los valores 3 y 6. Dentro de la función hace que si 6 no es igual a 0 que continue con el else y así recursivamente hasta que
    llegue a 0 y ya me devolverá el resultado*/ 
    ?>
</body>
</html>