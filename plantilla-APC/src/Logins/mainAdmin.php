<?php

require '../vendor/autoload.php';

session_start();
if(!isset($_SESSION["usuario"])){
    die("Error debe <a href='login.php'>idenfiticarse</a>");
}

if($_SESSION["usuario"]!="admin"){
    die("Error acceso no autorizado. <a href='login.php'>Acceda de nuevo</a>");
}

$nombre=$_SESSION["usuario"];
$videoclub=$_SESSION["videoclub"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?echo $nombre?></h1>
    <h2>Administración del VideoClub <?php echo $videoclub->getNombre()?></h2>
    <a href="logOut.php">Cerrar sesión</a>
</body>
</html>