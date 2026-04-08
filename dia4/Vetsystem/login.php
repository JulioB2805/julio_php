<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inicio Sesión</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
            <h1>Iniciar Sesión</h1>
            <form method="post" action="dashboard.php">
                <input type = "text" name="user"  // user es bajo que denominacion va al dashboard
                placeholder = "Nombre de usuario" required autofocus/>
                <button type="submit">Acceder</buttton>
            </form>
    </body>
</html>