<?php 
    //Diccionario básico
    $diccionario = [
        "hola" => "hello",
        "adios"=>"goodbye",
        "gracias"=>"Thank you"
    
    ];

    $traduccion = "";
    $palabra= "";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $palabra = strtolower(trim($_POST["palabra"]));

        if(array_key_exists($palabra,$diccionario)){
            $traduccion = $diccionario[$palabra];
        }else{
            $traduccion="Palabra no encontrada";
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Traductor Español - Ingles</title>
        <link rel= "stylesheet" href="css/estilo.css"/>
    </head>
    <body>

          <h2>Traductor básico</h2>
 
            <form method="POST">
                <label>Ingrese una palabra en Español:</label><br><br>
                <input type = "text" name = "palabra" value="<?php echo htmlspecialchars($palabra); ?>" required>
                <button class ="boton-buscar"type="submit">Resultado:</buttton>
            </form>

            <br>

            <?php if ($traduccion != ""): ?>
                <?php echo htmlspecialchars($traduccion); ?>
            <?php endif; ?>

    </body>
</html>