  
<?php
    echo "<hr>Array sobre los dias de la semana <br>";
    $dia [0]= "Domingo";
    $dia [1]= "Lunes";
    $dia [2]= "Martes";
    $dia [3]= "Miercoles";
    $dia [4]= "Jueves";
    $dia [5]= "Viernes";
    $dia [6]= "Sabado";

    echo "Hoy es el dia ".$dia[4];

    echo "<hr> Array sobre los meses del año <br>";
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre");
    echo "Estamos en el mes de ".$meses[2];

    echo"<hr>Array sobre productos teniendo como indice el producto<br>";
    $productos = array ("Tomate"=>6000,"Locote"=>4500,"Papa"=>4000,"Cebolla"=>5500);
    echo "El precio del tomate es ".$productos["Tomate"]." y el precio del  Locote es ".$productos["Locote"];
?>
