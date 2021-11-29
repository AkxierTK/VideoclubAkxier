<?php

if (isset($error)) {
    $error = "";
}


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
    <?php echo $error ?>
    <form action="inicio.php" method="POST">
        <legend>Login</legend>
        <label for="usuario">Usuario</label>
        <input name="usuario" type="text" />
        <label for="contraseña">Contraseña</label>
        <input name="contraseña" type="text" />
        <input type='submit' name='btnEnviar' value='Enviar' />
    </form>
</body>

</html>