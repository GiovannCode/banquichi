<?php
require_once 'db_conexion.php';
session_start();
if (isset($_POST['login'])) {
    $numero_c = $_POST['numero_c'];
    $pass = $_POST['pass'];
    $select = $cnnPDO->prepare('SELECT * from ba WHERE numero_c =? and pass=?');

    $select->execute([$numero_c, $pass]);
    $count = $select->rowCount();
    $campo = $select->fetch();

    if ($count) {
        $_SESSION['numero_c'] = $campo['numero_c'];
        $_SESSION['name'] = $campo['name'];
        $_SESSION['email'] = $campo['email'];
        $_SESSION['tipo_c'] = $campo['tipo_c'];
        header('location:inicio.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar alta de cuenta</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b1473ebfe8.js" crossorigin="anonymous"></script>
</head>

<body class="body-registro">
    <div class="container-principal-register">
        <div class="content-login-form">
            <div class="container-login-form">
                <h1>Inicio de Sesión</h1>
                <form method="post">
                    <input class="input-form-3" type="text" name="numero_c" required><i class="fa-solid fa-user"></i>
                    <label class="label-form-3">Numero de cuenta </label>


                    <input class="input-form-2" type="password" name="pass" required><i class="fa-solid fa-lock"></i>
                    <label class="label-form-2">Contraseña</label>

                    <button class="btn-form" type="submit" name="login">Iniciar de Sesión</button>
                </form>
            </div>
        </div>
        <div class="content-login">
            <div class="content-register-text">
                <h1>Gracias por formar parte de nuestro banco</h1>
                <br>
                <p>Para continuar, por favor inicia sesión:</p>
                <br>
                <a class="anclaje-registrar" href="register.php">¿No tienes cuenta? Registrarte aquí</a>
                <br>
                <br>
                <br>
                <a class="anclaje-home" href="index.php"> <i class="fa-solid fa-house"></i> Inicio</a>
            </div>
        </div>

    </div>
</body>

</html>