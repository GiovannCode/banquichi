<?php
session_start();
require_once 'db_conexion.php';
if (isset($_POST['depositar'])) {
    $numero_c = $_SESSION['numero_c'];
    $saldo = $_POST['saldo'];
    $sql = $cnnPDO->prepare("UPDATE cliente SET saldo = saldo + ? WHERE numero_c = ?");
    $sql->execute([$saldo, $numero_c]);
    $_SESSION['saldo'] = $saldo;
    unset($sql);
    unset($cnnPDO);
    header('location:inicio.php');
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
        <div class="content-register">
            <div class="content-register-text">
                <h1>Realiza tu depósito de manera fácil y segura. Solo llena el formulario ¡Tu dinero, siempre en buenas manos!</h1>
                <br>

                <a class="anclaje-home" href="index.php"> <i class="fa-solid fa-house"></i> Inicio</a>
            </div>
        </div>
        <div class="content-register-form">
            <div class="container-register-form">
                <h1>Depositar</h1>
            <form method="post">
                <!-- <input class="input-form-1" type="text" value="// name="numero_c" readonly required><i class="fa-solid fa-arrow-up-9-1"></i>
                <label class="label-form-1">Numero de cuenta </label> -->

                
                <!-- <input class="input-form-2" type="text" name="name" required><i class="fa-solid fa-user"></i>
                <label class="label-form-2">A Quien</label> -->

                <input class="input-form-3" type="text" name="saldo" required><i class="fa-solid fa-money-bill-transfer"></i>
                <label class="label-form-3">Monto A Depositar</label>

                <button class="btn-form" type="submit" name="depositar">Depositar</button>
            </form>
        </div>
        </div>
    </div>
</body>

</html>