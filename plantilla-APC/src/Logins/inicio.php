<?php

use VideoclubAkxier\VideoClub;

require '../vendor/autoload.php';


if (isset($_POST['btnEnviar']) && $_POST["btnEnviar"] == "Enviar") {
    $usuario = $_POST['inputUser'];
    $password = $_POST['inputPassword'];
    $videoclub= new VideoClub("SeveroVideoClub");
    if (empty($usuario) || empty($password)) {
        $error = "Debes introducir un usuario y contraseña";
        include("index.php");
    }else{
        if ($usuario == "admin" && $password == "admin"){
            session_start();
            $_SESSION["usuario"]=$usuario;
            $_SESSION["password"]=$password;
            $_SESSION["videoclub"]=$videoclub;
            header("Location ./mainAdmin.php");
        }else{
            foreach($videoclub->clientes as $cliente){
                if($cliente->getUsuario()==$usuario && $cliente->getContraseña()==$password){
                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    $_SESSION["password"]=$password;
                    $_SESSION["videoclub"]=$videoclub;
                    header("Location ./main.php");
                }
            }
        }
        $error = "Usuario o contraseña no válidos!";
        include("index.php");
    }




}