    <?php
    session_start();
    if (isset($_POST['user'])){
     $usuario=$_POST['user'];
        echo "¡Bienvenido! ,Usted ha iniciado sesión como ".$usuario;
    }
    if (isset($_SESSION['user'])){
        $usuario=$_SESSION['user'];
         
        echo "¡Bienvenido! ,Usted ha iniciado sesión como ".$usuario;
        echo "Bienvenido al dashboard";
    }
    echo"<br><a href='logout.php'>Salir</a>";
?>