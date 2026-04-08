<?php
    $numero = 45;
    echo "Ejemplo de if...";
    if($numero > 0){
        echo "<br>Numero positivo";
    }else if($numero<0){
        echo "<br>Numero negativo";
    }else{
        echo"<br>El numero es cero";
    }

    echo "<hr>Ejemplo de for...<br>";
    for ($x=0;$x<101;$x=$x+1){
        if($x % 2 ==0){
         echo "|".$x;
        }
    }

    echo "<hr>Ejemplo de while...<br>";
    $fila = 1 ;
    while($fila < 10){
        echo"<button> Click aqui </button>";
        $fila++;
    }
?>