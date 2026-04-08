
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Calculadora</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
            if (! empty($_GET["n1"]) &&  !empty($_GET["n2"]) && !empty($_GET["op"])){
                $num1 = $_GET ["n1"];
                $num2 = $_GET ["n2"];
                $op = $_GET ["op"];
                if($op == "+"){
                    $resultado = $num1 + $num2;
                }
            }
        ?>
        <title>Calculadora Casio </title>
        <form method="get" action="calculadora.php">
            <input type="text" name="n1" value ="<?php if(isset($num1)){echo $num1;}?>"/>  </br>
            <input type="text" name="n2" value ="<?php if(isset($num1)){echo $num1;}?>"/>  </br>
            <select name="op">
                <option value="+">Sumar</option>
                <option value="-">Restar</option>
                <option value="*">Multiplicar</option>
                <option value="/">Dividir</option>
          </select></br>
         <button type="submit">Calcular</button></br>
     </form>
     <?php  
            if(isset($resultado)){
                echo "<h3>".$resultado."</h3>";
            }
      ?>
  </body>
</html>