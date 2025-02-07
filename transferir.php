<?php
session_start();
require_once 'db_conexion.php';
if (isset($_POST['transferir'])) {
    $numero_c_origen = $_SESSION['numero_c'];
    $numero_c_destino = $_POST['numero_c'];
    $monto = $_POST['monto'];

    $sql = $cnnPDO->prepare("SELECT saldo, name FROM cliente WHERE numero_c = ?");
    $sql->execute([$numero_c_origen]);
    $origen = $sql->fetch(PDO::FETCH_ASSOC);

    
    

    if (!$origen || $origen['saldo'] < $monto) {
        echo "<script>alert('Saldo insuficiente para la transferencia.');</script>";
    } elseif ($numero_c_origen == $numero_c_destino) {
        echo "<script>alert('No puedes transferir a la misma cuenta.');</script>";
    } else {
        $sql = $cnnPDO->prepare("SELECT saldo, name FROM cliente WHERE numero_c = ?");
        $sql->execute([$numero_c_destino]);
        $destino = $sql->fetch(PDO::FETCH_ASSOC);
        if (!$destino) {
            echo "<script>alert('La cuenta destino no existe.');</script>";
        } else {
            $sql = $cnnPDO->prepare("UPDATE cliente SET saldo = saldo - ? WHERE numero_c = ?");
            $sql->execute([$monto, $numero_c_origen]);

            $sql = $cnnPDO->prepare("UPDATE cliente SET saldo = saldo + ? WHERE numero_c = ?");
            $sql->execute([$monto, $numero_c_destino]);
            
            date_default_timezone_set('America/Mexico_City');
            $fecha = date("Y-m-d H:i:s");
            $sql = $cnnPDO->prepare("INSERT INTO transferencias (numero_c_remitente, nombre_remitente, fecha, monto, numero_c_destinatario, nombre_destinatario) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->execute([$numero_c_origen, $origen['name'], $fecha, $monto, $numero_c_destino, $destino['name']]);

            $_SESSION['saldo'] -= $monto;

            echo "<script>alert('Transferencia realizada con éxito.'); window.location.href='inicio.php';</script>";

        }
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
                <h1>Transferir</h1>
                <form method="post">
                    <input class="input-form-3" type="text" name="numero_c" required><i class="fa-solid fa-arrow-up-9-1"></i>
                    <label class="label-form-3">Numero de cuenta </label>


                    <input class="input-form-2" type="text" name="monto" required><i class="fa-solid fa-lock"></i>
                    <label class="label-form-2">Monto</label>

                <span class="saldo">
                    <p><?php echo $_SESSION['saldo']?>$</p>
                    <button class="btn-form-trans" type="submit" name="transferir">Transferir</button>
                </span>
                </form>
            </div>
        </div>
        <div class="content-login">
            <div class="content-register-text">
                <h1>Transfiere de forma rápida y segura. Ingresa los datos de la cuenta destino, completa tu transferencia en minutos. ¡Así de fácil!</h1>
                <br>
                <p> </p>
                <br>
                <a class="anclaje-home" href="inicio.php"> <i class="fa-solid fa-house"></i> Inicio</a>
            </div>
        </div>

    </div>
</body>

</html>